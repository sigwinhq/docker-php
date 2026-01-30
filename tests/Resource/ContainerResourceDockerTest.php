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

use Docker\API\Model\ContainersCreatePostBody;
use Docker\API\Model\HostConfig;
use Docker\Stream\DockerRawStream;
use Docker\Tests\DockerTestCase;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class ContainerResourceDockerTest extends DockerTestCase
{
    /**
     * Return the container manager.
     */
    private function getManager()
    {
        return self::getDockerClient();
    }

    /**
     * Be sure to have image before doing test.
     */
    public static function setUpBeforeClass(): void
    {
        self::getDockerClient()->imageCreate('', [
            'fromImage' => 'busybox:latest',
        ]);
    }

    public function testAttach(): void
    {
        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['echo', '-n', 'output']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);
        $dockerRawStream = $this->getManager()->containerAttach($containerCreateResult->getId(), [
            'stream' => true,
            'stdout' => true,
        ]);

        $stdoutFull = '';
        $dockerRawStream->onStdout(static function ($stdout) use (&$stdoutFull): void {
            $stdoutFull .= $stdout;
        });

        $this->getManager()->containerStart($containerCreateResult->getId());
        $this->getManager()->containerWait($containerCreateResult->getId());

        $dockerRawStream->wait();

        self::assertSame('output', $stdoutFull);
    }

    public function testAttachWebsocket(): void
    {
        $hostConfig = new HostConfig();
        $hostConfig->setAutoRemove(true);

        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['sh']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setAttachStderr(true);
        $containerConfig->setAttachStdin(false);
        $containerConfig->setOpenStdin(true);
        $containerConfig->setTty(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));
        $containerConfig->setHostConfig($hostConfig);

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);
        $webSocketStream = $this->getManager()->containerAttachWebsocket($containerCreateResult->getId(), [
            'stream' => true,
            'stdout' => true,
            'stderr' => true,
            'stdin' => true,
        ]);

        $this->getManager()->containerStart($containerCreateResult->getId());

        // Read the bash first line
        $webSocketStream->read();

        // No output after that so it should be false
        self::assertFalse($webSocketStream->read());

        // Write something to the container
        $webSocketStream->write("echo test\n");

        // Test for echo present (stdin)
        $output = '';

        while (($data = $webSocketStream->read()) !== false) {
            $output .= $data;
        }

        self::assertStringContainsString('echo', $output);

        // Exit the container
        $webSocketStream->write("exit\n");
    }

    public function testLogs(): void
    {
        $hostConfig = new HostConfig();
        $hostConfig->setAutoRemove(true);

        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['echo', '-n', 'output']);
        $containerConfig->setAttachStdout(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));
        $containerConfig->setHostConfig($hostConfig);

        $containerCreateResult = $this->getManager()->containerCreate($containerConfig);

        $this->getManager()->containerStart($containerCreateResult->getId());
        $this->getManager()->containerWait($containerCreateResult->getId());

        $logsStream = $this->getManager()->containerLogs($containerCreateResult->getId(), [
            'stdout' => true,
            'stderr' => true,
        ]);

        self::assertInstanceOf(DockerRawStream::class, $logsStream);
    }
}
