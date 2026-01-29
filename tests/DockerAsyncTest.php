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

use Amp\Loop;
use Docker\API\Model\ContainersCreatePostBody;
use Docker\API\Model\EventsGetResponse200;
use Docker\DockerAsync;
use Docker\Stream\ArtaxCallbackStream;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class DockerAsyncTest extends \PHPUnit\Framework\TestCase
{
    public function testStaticConstructor(): void
    {
        self::assertInstanceOf(DockerAsync::class, DockerAsync::create());
    }

    public function testAsync(): void
    {
        Loop::run(function () {
            $docker = DockerAsync::create();

            $containerConfig = new ContainersCreatePostBody();
            $containerConfig->setImage('busybox:latest');
            $containerConfig->setCmd(['echo', '-n', 'output']);
            $containerConfig->setAttachStdout(true);
            $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

            $response = yield $docker->imageCreate('', [
                'fromImage' => 'busybox:latest',
            ], [], DockerAsync::FETCH_RESPONSE);

            yield $response->getBody();

            $containerCreate = yield $docker->containerCreate($containerConfig);
            $containerStart = yield $docker->containerStart($containerCreate->getId());
            $containerInfo = yield $docker->containerInspect($containerCreate->getId());

            $this->assertSame($containerCreate->getId(), $containerInfo->getId());
        });
    }

    public function testSystemEventsAllowTheConsumptionOfDockerEvents(): void
    {
        $matchedEvents = [];

        Loop::run(static function () use (&$matchedEvents) {
            $docker = DockerAsync::create();

            /** @var ArtaxCallbackStream $events */
            $events = yield $docker->systemEvents([
                'filters' => json_encode(
                    [
                        'type' => ['container'],
                        'action' => ['create'],
                    ]
                ),
            ]);
            $events->onFrame(static function ($event) use (&$matchedEvents): void {
                if (\is_object($event)
                    && $event instanceof EventsGetResponse200
                    && 'create' === $event->getAction()
                    && 'container' === $event->getType()
                ) {
                    $matchedEvents[] = $event;
                }
            });

            $events->listen();

            $containerConfig = new ContainersCreatePostBody();
            $containerConfig->setImage('busybox:latest');
            $containerConfig->setCmd(['echo', '-n', 'output']);

            yield $docker->containerCreate($containerConfig);

            Loop::delay(1000, static function (): void {
                Loop::stop();
            });
        });

        self::assertCount(1, $matchedEvents);
    }
}
