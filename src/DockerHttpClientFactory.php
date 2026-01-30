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

namespace Docker;

use Docker\Stream\WebSocketHandshake;
use Psr\Http\Client\ClientInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\HttplugClient;

final class DockerHttpClientFactory
{
    /**
     * Create a WebSocket connection to Docker daemon.
     *
     * @param string $path  WebSocket endpoint path
     * @param array  $query Query parameters
     *
     * @return resource Raw socket resource after WebSocket upgrade
     */
    public static function createWebSocketConnection(string $path, array $query = [])
    {
        $dockerHost = getenv('DOCKER_HOST') ?: 'unix:///var/run/docker.sock';

        return WebSocketHandshake::connect($dockerHost, $path, $query);
    }

    public static function create(array $config = []): ClientInterface
    {
        if (! \array_key_exists('remote_socket', $config)) {
            $config['remote_socket'] = 'unix:///var/run/docker.sock';
        }

        $options = [];

        // Handle Unix socket or TCP connection
        if (preg_match('#^unix://(.+)$#', $config['remote_socket'], $matches)) {
            // Extract the actual file path from unix:// URL
            $options['bindto'] = $matches[1];
            $options['base_uri'] = 'http://localhost';
        } else {
            $options['base_uri'] = $config['remote_socket'];
        }

        // Handle SSL/TLS configuration
        if (isset($config['ssl']) && $config['ssl']) {
            if (isset($config['stream_context_options']['ssl'])) {
                $sslContext = $config['stream_context_options']['ssl'];

                if (isset($sslContext['cafile'])) {
                    $options['cafile'] = $sslContext['cafile'];
                }
                if (isset($sslContext['local_cert'])) {
                    $options['local_cert'] = $sslContext['local_cert'];
                }
                if (isset($sslContext['local_pk'])) {
                    $options['local_pk'] = $sslContext['local_pk'];
                }
            }
        }

        $httpClient = HttpClient::create($options);

        return new HttplugClient($httpClient);
    }

    public static function createFromEnv(): ClientInterface
    {
        $options = [
            'remote_socket' => getenv('DOCKER_HOST') ? getenv('DOCKER_HOST') : 'unix:///var/run/docker.sock',
        ];

        if (getenv('DOCKER_TLS_VERIFY') && '1' === getenv('DOCKER_TLS_VERIFY')) {
            if (! getenv('DOCKER_CERT_PATH')) {
                throw new \RuntimeException('Connection to docker has been set to use TLS, but no PATH is defined for certificate in DOCKER_CERT_PATH docker environment variable');
            }

            $cafile = getenv('DOCKER_CERT_PATH').\DIRECTORY_SEPARATOR.'ca.pem';
            $certfile = getenv('DOCKER_CERT_PATH').\DIRECTORY_SEPARATOR.'cert.pem';
            $keyfile = getenv('DOCKER_CERT_PATH').\DIRECTORY_SEPARATOR.'key.pem';

            $stream_context = [
                'cafile' => $cafile,
                'local_cert' => $certfile,
                'local_pk' => $keyfile,
            ];

            $options['ssl'] = true;
            $options['stream_context_options'] = [
                'ssl' => $stream_context,
            ];
        }

        return self::create($options);
    }
}
