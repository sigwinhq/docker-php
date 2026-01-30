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

namespace Docker\Tests\Resource;

use Docker\Tests\DockerTestCase;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Medium]
final class SystemResourceDockerTest extends DockerTestCase
{
    /**
     * Return a container manager.
     */
    private function getManager()
    {
        return self::getDockerClient();
    }

    public function testGetEvents(): void
    {
        $stream = $this->getManager()->systemEvents([
            'since' => (string) (time() - 1),
            'until' => (string) (time() + 4),
        ]);

        $lastEvent = null;

        $stream->onFrame(static function ($event) use (&$lastEvent): void {
            $lastEvent = $event;
        });

        self::getDockerClient()->imageCreate('', [
            'fromImage' => 'busybox:latest',
        ]);

        $stream->wait();

        self::assertNotNull($lastEvent);
        self::assertInstanceOf(\Docker\API\Model\EventMessage::class, $lastEvent);
    }
}
