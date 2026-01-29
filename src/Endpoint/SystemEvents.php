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

namespace Docker\Endpoint;

use Amp\Artax\Client as ArtaxClient;
use Docker\API\Endpoint\SystemEvents as BaseEndpoint;
use Docker\Client\AmpArtaxStreamEndpoint;
use Docker\Client\AmpArtaxStreamEndpointTrait;
use Docker\Client\ProvideAmpArtaxClientOptions;
use Docker\Stream\EventStream;
use Jane\OpenApiRuntime\Client\Client;
use Jane\OpenApiRuntime\Client\Exception\InvalidFetchModeException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class SystemEvents extends BaseEndpoint implements AmpArtaxStreamEndpoint, ProvideAmpArtaxClientOptions
{
    use AmpArtaxStreamEndpointTrait;

    public function getAmpArtaxClientOptions(): array
    {
        return [ArtaxClient::OP_TRANSFER_TIMEOUT => 0];
    }

    public function parsePSR7Response(ResponseInterface $response, SerializerInterface $serializer, string $fetchMode = Client::FETCH_OBJECT)
    {
        if ($fetchMode === Client::FETCH_OBJECT) {
            if (200 === $response->getStatusCode()) {
                return new EventStream($response->getBody(), $serializer);
            }

            return $this->transformResponseBody((string) $response->getBody(), $response->getStatusCode(), $serializer);
        }

        if ($fetchMode === Client::FETCH_RESPONSE) {
            return $response;
        }

        throw new InvalidFetchModeException(\sprintf('Fetch mode %s is not supported', $fetchMode));
    }
}
