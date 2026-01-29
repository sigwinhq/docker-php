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

namespace Docker\Client;

use Amp\Artax\Response;
use Amp\CancellationTokenSource;
use Amp\Promise;
use Docker\Stream\ArtaxCallbackStream;
use Jane\OpenApiRuntime\Client\Client;
use Jane\OpenApiRuntime\Client\Exception\InvalidFetchModeException;
use Symfony\Component\Serializer\SerializerInterface;

use function Amp\call;

trait AmpArtaxStreamEndpointTrait
{
    abstract protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer);

    public function parseArtaxStreamResponse(
        Response $response,
        SerializerInterface $serializer,
        CancellationTokenSource $cancellationTokenSource,
        string $fetchMode = Client::FETCH_OBJECT,
    ): Promise {
        if (! \in_array($fetchMode, [Client::FETCH_OBJECT, Client::FETCH_RESPONSE], true)) {
            throw new InvalidFetchModeException(\sprintf('Fetch mode %s is not supported', $fetchMode));
        }

        return call(function () use ($response, $serializer, $fetchMode, $cancellationTokenSource) {
            $responseTransformer = null;
            if ($fetchMode === Client::FETCH_OBJECT) {
                $responseTransformer = function ($chunk) use ($response, $serializer) {
                    return $this->transformResponseBody($chunk, $response->getStatus(), $serializer);
                };
            }

            return new ArtaxCallbackStream($response->getBody(), $cancellationTokenSource, $responseTransformer);
        });
    }
}
