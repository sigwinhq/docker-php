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
use Jane\OpenApiRuntime\Client\Client;
use Symfony\Component\Serializer\SerializerInterface;

interface AmpArtaxStreamEndpoint
{
    /**
     * Parse and transform an Artax InputStream chunk into a different object.
     *
     * Implementations may vary depending the status code of the response and the fetch mode used.
     */
    public function parseArtaxStreamResponse(
        Response $response,
        SerializerInterface $serializer,
        CancellationTokenSource $cancellationTokenSource,
        string $fetchMode = Client::FETCH_OBJECT,
    ): Promise;
}
