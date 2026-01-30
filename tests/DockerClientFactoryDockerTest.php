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

use Docker\DockerClientFactory;
use Psr\Http\Client\ClientInterface;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class DockerClientFactoryDockerTest extends DockerTestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        putenv('DOCKER_TLS_VERIFY');
        putenv('DOCKER_CERT_PATH');
    }

    public function testStaticConstructor(): void
    {
        self::assertInstanceOf(ClientInterface::class, DockerClientFactory::create());
    }

    #[\PHPUnit\Framework\Attributes\Test]
    public function testCreateFromEnvWithoutCertPath(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Connection to docker has been set to use TLS, but no PATH is defined for certificate in DOCKER_CERT_PATH docker environment variable');

        putenv('DOCKER_TLS_VERIFY=1');
        DockerClientFactory::createFromEnv();
    }

    public function testCreateCustomCa(): void
    {
        putenv('DOCKER_TLS_VERIFY=1');
        putenv('DOCKER_CERT_PATH=/tmp');

        $client = DockerClientFactory::createFromEnv();
        self::assertInstanceOf(ClientInterface::class, $client);
    }

    public function testCreateCustomPeerName(): void
    {
        putenv('DOCKER_TLS_VERIFY=1');
        putenv('DOCKER_CERT_PATH=/abc');

        $client = DockerClientFactory::createFromEnv();
        self::assertInstanceOf(ClientInterface::class, $client);
    }
}
