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

use Docker\API\Model\ContainersCreatePostBody;
use Docker\API\Model\HostConfig;
use Docker\DockerClient;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Medium]
final class DockerClientTest extends DockerTestCase
{
    public function testCreate(): void
    {
        self::assertInstanceOf(DockerClient::class, DockerClient::create());
    }

    public function testContainerLifecycle(): void
    {
        $client = self::getDockerClient();

        // Pull image if needed
        $client->imageCreate('', [
            'fromImage' => 'busybox:latest',
        ]);

        $hostConfig = new HostConfig();
        $hostConfig->setAutoRemove(true);

        // Create container
        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['sh']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject([
            'docker-php-test' => 'true',
            'origin' => __METHOD__,
        ]));
        $containerConfig->setHostConfig($hostConfig);

        $containerCreate = $client->containerCreate($containerConfig);
        self::assertNotNull($containerCreate->getId());

        // Start container
        $client->containerStart($containerCreate->getId());

        // Wait for container to finish
        $client->containerWait($containerCreate->getId());

        // List containers to verify it exists
        $containers = $client->containerList(['all' => true]);
        $found = false;
        foreach ($containers as $container) {
            if ($container->getId() === $containerCreate->getId()) {
                $found = true;
                break;
            }
        }

        self::assertTrue($found, 'Container should be in the list');
    }
}
