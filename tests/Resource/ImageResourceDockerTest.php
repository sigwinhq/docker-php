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

use Docker\API\Client;
use Docker\API\Model\AuthConfig;
use Docker\Context\ContextBuilder;
use Docker\Tests\DockerTestCase;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class ImageResourceDockerTest extends DockerTestCase
{
    /**
     * Return a container manager.
     */
    private function getManager()
    {
        return self::getDockerClient();
    }

    public function testBuild(): void
    {
        $contextBuilder = new ContextBuilder();
        $contextBuilder->from('ubuntu:precise');
        $contextBuilder->add('/test', 'test file content');

        $context = $contextBuilder->getContext();
        $buildStream = $this->getManager()->imageBuild($context->read(), ['t' => 'test-image']);

        self::assertInstanceOf('Docker\Stream\BuildStream', $buildStream);

        $lastMessage = '';

        $buildStream->onFrame(static function ($frame) use (&$lastMessage): void {
            $lastMessage = $frame->getStream();
        });
        $buildStream->wait();

        self::assertContains('Successfully', $lastMessage);
    }

    public function testCreate(): void
    {
        $createImageStream = $this->getManager()->imageCreate('', [
            'fromImage' => 'registry:latest',
        ]);

        self::assertInstanceOf('Docker\Stream\CreateImageStream', $createImageStream);

        $firstMessage = null;

        $createImageStream->onFrame(static function ($createImageInfo) use (&$firstMessage): void {
            if ($firstMessage === null) {
                $firstMessage = $createImageInfo->getStatus();
            }
        });
        $createImageStream->wait();

        self::assertContains('Pulling from library/registry', $firstMessage);
    }

    public function testPushStream(): void
    {
        $contextBuilder = new ContextBuilder();
        $contextBuilder->from('ubuntu:precise');
        $contextBuilder->add('/test', 'test file content');

        $context = $contextBuilder->getContext();
        $this->getManager()->imageBuild($context->read(), ['t' => 'localhost:5000/test-image'], [], Client::FETCH_OBJECT);

        $registryConfig = new AuthConfig();
        $registryConfig->setServeraddress('localhost:5000');
        $pushImageStream = $this->getManager()->imagePush('localhost:5000/test-image', [], [
            'X-Registry-Auth' => $registryConfig,
        ]);

        self::assertInstanceOf('Docker\Stream\PushStream', $pushImageStream);

        $firstMessage = null;

        $pushImageStream->onFrame(static function ($pushImageInfo) use (&$firstMessage): void {
            if ($firstMessage === null) {
                $firstMessage = $pushImageInfo->getStatus();
            }
        });
        $pushImageStream->wait();

        self::assertContains('repository [localhost:5000/test-image]', $firstMessage);
    }
}
