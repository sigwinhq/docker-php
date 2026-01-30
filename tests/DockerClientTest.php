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
use Docker\DockerClient;
use Docker\DockerClientFactory;
use Http\Client\HttpAsyncClient;
use Psr\Http\Client\ClientInterface;

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

    public function testHttpClientImplementsSyncInterface(): void
    {
        $httpClient = DockerClientFactory::create();
        self::assertInstanceOf(ClientInterface::class, $httpClient);
    }

    public function testHttpClientImplementsAsyncInterface(): void
    {
        $httpClient = DockerClientFactory::create();
        self::assertInstanceOf(HttpAsyncClient::class, $httpClient,
            'HttplugClient should implement HttpAsyncClient for async support');
    }

    public function testContainerLifecycle(): void
    {
        $docker = self::getDockerClient();

        // Pull image if needed
        $docker->imageCreate('', [
            'fromImage' => 'busybox:latest',
        ]);

        // Create container
        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['echo', '-n', 'output']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreate = $docker->containerCreate($containerConfig);
        self::assertNotNull($containerCreate->getId());

        // Start container
        $docker->containerStart($containerCreate->getId());

        // Wait for container to finish
        $docker->containerWait($containerCreate->getId());

        // List containers to verify it exists
        $containers = $docker->containerList(['all' => true]);
        $found = false;
        foreach ($containers as $container) {
            if ($container->getId() === $containerCreate->getId()) {
                $found = true;
                break;
            }
        }
        self::assertTrue($found, 'Container should be in the list');

        // Cleanup
        $docker->containerDelete($containerCreate->getId());
    }
}
