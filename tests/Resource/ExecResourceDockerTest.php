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
use Docker\API\Model\ContainersIdExecPostBody;
use Docker\API\Model\ExecIdJsonGetResponse200;
use Docker\API\Model\ExecIdStartPostBody;
use Docker\Stream\DockerRawStream;
use Docker\Tests\DockerTestCase;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class ExecResourceDockerTest extends DockerTestCase
{
    /**
     * Return the container manager.
     */
    private function getManager()
    {
        return self::getDockerClient();
    }

    public function testStartStream(): void
    {
        $createContainerResult = $this->createContainer();

        $execConfig = new ContainersIdExecPostBody();
        $execConfig->setAttachStdout(true);
        $execConfig->setAttachStderr(true);
        $execConfig->setCmd(['echo', 'output']);

        $execCreateResult = $this->getManager()->containerExec($createContainerResult->getId(), $execConfig);

        $execStartConfig = new ExecIdStartPostBody();
        $execStartConfig->setDetach(false);
        $execStartConfig->setTty(false);

        $stream = $this->getManager()->execStart($execCreateResult->getId(), $execStartConfig);

        self::assertInstanceOf(DockerRawStream::class, $stream);

        $stdoutFull = '';
        $stream->onStdout(static function ($stdout) use (&$stdoutFull): void {
            $stdoutFull .= $stdout;
        });
        $stream->wait();

        self::assertSame("output\n", $stdoutFull);

        self::getDockerClient()->containerKill($createContainerResult->getId(), [
            'signal' => 'SIGKILL',
        ]);
    }

    public function testExecFind(): void
    {
        $createContainerResult = $this->createContainer();

        $execConfig = new ContainersIdExecPostBody();
        $execConfig->setCmd(['/bin/true']);
        $execCreateResult = $this->getManager()->containerExec($createContainerResult->getId(), $execConfig);

        $execStartConfig = new ExecIdStartPostBody();
        $execStartConfig->setDetach(false);
        $execStartConfig->setTty(false);

        $this->getManager()->execStart($execCreateResult->getId(), $execStartConfig);

        $execFindResult = $this->getManager()->execInspect($execCreateResult->getId());

        self::assertInstanceOf(ExecIdJsonGetResponse200::class, $execFindResult);

        self::getDockerClient()->containerKill($createContainerResult->getId(), [
            'signal' => 'SIGKILL',
        ]);
    }

    private function createContainer()
    {
        $containerConfig = new ContainersCreatePostBody();
        $containerConfig->setImage('busybox:latest');
        $containerConfig->setCmd(['sh']);
        $containerConfig->setOpenStdin(true);
        $containerConfig->setLabels(new \ArrayObject(['docker-php-test' => 'true']));

        $containerCreateResult = self::getDockerClient()->containerCreate($containerConfig);
        self::getDockerClient()->containerStart($containerCreateResult->getId());

        return $containerCreateResult;
    }
}
