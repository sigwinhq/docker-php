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
 * Represent a stream when pushing an image to a repository (with the push api endpoint of image).
 *
 * Callable(s) passed to this stream will take a PushImageInfo object as the first argument
 */
final class PushStream extends MultiJsonStream
{
    /**
     * [@inheritdoc}.
     */
    protected function getDecodeClass()
    {
        return 'PushImageInfo';
    }
}
