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

namespace Docker\Tests;

use Docker\Docker;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class DockerDockerTest extends DockerTestCase
{
    public function testCreate(): void
    {
        self::assertInstanceOf(Docker::class, Docker::create());
    }
}
