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

namespace Docker\Tests\Context;

use Docker\Context\Context;
use Docker\Context\ContextBuilder;
use Docker\Tests\DockerTestCase;
use Symfony\Component\Process\Process;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class ContextDockerTest extends DockerTestCase
{
    public function testReturnsValidTarContent(): void
    {
        $directory = __DIR__.\DIRECTORY_SEPARATOR.'context-test';

        $context = new Context($directory);
        $process = new Process(['/usr/bin/env', 'tar', 'c', '.'], $directory);
        $process->run();

        self::assertSame(mb_strlen($process->getOutput()), mb_strlen($context->toTar()));
    }

    public function testReturnsValidTarStream(): void
    {
        $directory = __DIR__.\DIRECTORY_SEPARATOR.'context-test';

        $context = new Context($directory);
        self::assertIsResource($context->toStream());
    }

    public function testDirectorySetter(): void
    {
        $context = new Context('abc');
        self::assertSame('abc', $context->getDirectory());
        $context->setDirectory('def');
        self::assertSame('def', $context->getDirectory());
    }

    public function testTarFailed(): void
    {
        $this->expectException(\Symfony\Component\Process\Exception\ProcessFailedException::class);

        $directory = __DIR__.\DIRECTORY_SEPARATOR.'context-test';
        $path = getenv('PATH');
        putenv('PATH=/');
        $context = new Context($directory);
        try {
            $context->toTar();
        } finally {
            putenv("PATH={$path}");
        }
    }

    public function testRemovesFilesOnDestruct(): void
    {
        $context = (new ContextBuilder())->getContext();
        $file = $context->getDirectory().'/Dockerfile';
        self::assertFileExists($file);

        unset($context);

        self::assertFileDoesNotExist($file);
    }
}
