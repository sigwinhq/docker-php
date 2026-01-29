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

use Docker\API\Model\EventsGetResponse200;
use Docker\Tests\TestCase;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class SystemResourceTest extends TestCase
{
    /**
     * Return a container manager.
     */
    private function getManager()
    {
        return self::getDocker();
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

        self::getDocker()->imageCreate('', [
            'fromImage' => 'busybox:latest',
        ]);

        $stream->wait();

        self::assertInstanceOf(EventsGetResponse200::class, $lastEvent);
    }
}
