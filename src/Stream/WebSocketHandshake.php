<?php

declare(strict_types=1);

/*
 * This file is part of the docker-php project.
 *
 * (c) 2013 Geoffrey Bachelet <geoffrey.bachelet@gmail.com> and contributors
 * (c) 2019 Joël Wurtz
 * (c) 2026 sigwin.hr
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Docker\Stream;

/**
 * Minimal WebSocket client handshake implementation.
 * Only implements the client-side upgrade handshake - frame encoding/decoding is handled by AttachWebsocketStream.
 */
final class WebSocketHandshake
{
    /**
     * Perform WebSocket upgrade handshake and return the raw socket.
     *
     * @param string $socketPath Unix socket path or TCP address (e.g., 'unix:///var/run/docker.sock' or 'tcp://localhost:2375')
     * @param string $path       HTTP path for the WebSocket endpoint
     * @param array  $query      Query parameters
     *
     * @return resource Raw socket resource after successful upgrade
     *
     * @throws \RuntimeException If connection or upgrade fails
     */
    public static function connect(string $socketPath, string $path, array $query = [])
    {
        // Build query string
        $queryString = http_build_query($query);
        if ($queryString !== '') {
            $path .= '?'.$queryString;
        }

        // Open socket connection
        $socket = @stream_socket_client($socketPath, $errno, $errstr, 30);
        if ($socket === false) {
            throw new \RuntimeException("Failed to connect to {$socketPath}: {$errstr} ({$errno})");
        }

        // Generate WebSocket key (random 16 bytes, base64 encoded)
        $key = base64_encode(random_bytes(16));

        // Send WebSocket upgrade request
        $request = "GET {$path} HTTP/1.1\r\n";
        $request .= "Host: localhost\r\n";
        $request .= "Upgrade: websocket\r\n";
        $request .= "Connection: Upgrade\r\n";
        $request .= "Sec-WebSocket-Key: {$key}\r\n";
        $request .= "Sec-WebSocket-Version: 13\r\n";
        $request .= "\r\n";

        fwrite($socket, $request);

        // Read response headers
        $response = '';
        while (($line = fgets($socket)) !== false) {
            $response .= $line;
            if ($line === "\r\n") {
                break; // Empty line indicates end of headers
            }
        }

        // Parse and validate response
        $lines = explode("\r\n", $response);
        $statusLine = $lines[0] ?? '';

        if (! preg_match('#^HTTP/1\.1 101 #', $statusLine)) {
            fclose($socket);
            throw new \RuntimeException("WebSocket upgrade failed. Expected '101 Switching Protocols', got: {$statusLine}");
        }

        // Verify Upgrade and Connection headers
        $headers = [];
        foreach ($lines as $line) {
            if (str_contains($line, ':')) {
                [$name, $value] = explode(':', $line, 2);
                $headers[mb_strtolower(mb_trim($name))] = mb_trim($value);
            }
        }

        if (! isset($headers['upgrade']) || mb_strtolower($headers['upgrade']) !== 'websocket') {
            fclose($socket);
            throw new \RuntimeException('WebSocket upgrade failed: Missing or invalid Upgrade header');
        }

        if (! isset($headers['connection']) || mb_strtolower($headers['connection']) !== 'upgrade') {
            fclose($socket);
            throw new \RuntimeException('WebSocket upgrade failed: Missing or invalid Connection header');
        }

        // Optionally verify Sec-WebSocket-Accept (hash of key + magic string)
        // For Docker's use case, this is not strictly necessary, but we can add it if needed

        return $socket;
    }
}
