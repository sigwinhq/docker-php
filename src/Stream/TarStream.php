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

use GuzzleHttp\Psr7\Stream;

/**
 * This class avoid a bug in PHP where fstat return a size of 0 for process stream.
 */
final class TarStream extends Stream
{
    public function getSize()
    {
        return null;
    }
}
