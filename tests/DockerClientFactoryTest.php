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
use Http\Client\HttpClient;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class DockerClientFactoryTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        putenv('DOCKER_TLS_VERIFY');
    }

    public function testStaticConstructor(): void
    {
        self::assertInstanceOf(HttpClient::class, DockerClientFactory::create());
    }

    /**
     * @expectedException \RuntimeException
     *
     * @expectedExceptionMessage Connection to docker has been set to use TLS, but no PATH is defined for certificate in DOCKER_CERT_PATH docker environment variable
     */
    public function testCreateFromEnvWithoutCertPath(): void
    {
        putenv('DOCKER_TLS_VERIFY=1');
        DockerClientFactory::createFromEnv();
    }

    public function testCreateCustomCa(): void
    {
        putenv('DOCKER_TLS_VERIFY=1');
        putenv('DOCKER_CERT_PATH=/tmp');

        $count = \count(get_resources('stream-context'));
        $client = DockerClientFactory::createFromEnv();
        self::assertInstanceOf(HttpClient::class, $client);

        $contexts = get_resources('stream-context');
        self::assertCount($count + 1, $contexts);

        // Get the last stream context.
        $context = stream_context_get_options(end($contexts));
        self::assertSame('/tmp/ca.pem', $context['ssl']['cafile']);
        self::assertSame('/tmp/cert.pem', $context['ssl']['local_cert']);
        self::assertSame('/tmp/key.pem', $context['ssl']['local_pk']);
    }

    public function testCreateCustomPeerName(): void
    {
        putenv('DOCKER_TLS_VERIFY=1');
        putenv('DOCKER_CERT_PATH=/abc');
        putenv('DOCKER_PEER_NAME=test');

        $count = \count(get_resources('stream-context'));
        $client = DockerClientFactory::createFromEnv();
        self::assertInstanceOf(HttpClient::class, $client);

        $contexts = get_resources('stream-context');
        self::assertCount($count + 1, $contexts);

        // Get the last stream context.
        $context = stream_context_get_options(end($contexts));
        self::assertSame('/abc/ca.pem', $context['ssl']['cafile']);
        self::assertSame('/abc/cert.pem', $context['ssl']['local_cert']);
        self::assertSame('/abc/key.pem', $context['ssl']['local_pk']);
        self::assertSame('test', $context['ssl']['peer_name']);
    }
}
