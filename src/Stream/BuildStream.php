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

use Docker\API\Model\BuildInfo;

/**
 * Represent a stream when building a dockerfile.
 *
 * Callable(s) passed to this stream will take a BuildInfo object as the first argument
 */
final class BuildStream extends MultiJsonStream
{
    protected function getDecodeClass(): string
    {
        return BuildInfo::class;
    }
}
