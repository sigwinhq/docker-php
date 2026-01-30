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

namespace Docker\Tests\Stream;

use Docker\API\Model\BuildInfo;
use Docker\Stream\BuildStream;
use Docker\Tests\DockerTestCase;
use Nyholm\Psr7\Stream;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class MultiJsonStreamDockerTest extends DockerTestCase
{
    #[\PHPUnit\Framework\Attributes\DataProvider('provideReadJsonEscapedDoubleQuoteCases')]
    public function testReadJsonEscapedDoubleQuote(string $jsonStream, array $jsonParts): void
    {
        $stream = Stream::create($jsonStream);

        $serializer = $this->getMockBuilder(SerializerInterface::class)
            ->getMock()
        ;

        $matcher = self::exactly(\count($jsonParts));
        $serializer
            ->expects($matcher)
            ->method('deserialize')
            ->willReturnCallback(static function ($data, $type, $format, $context) use ($matcher, $jsonParts) {
                $invocationIndex = $matcher->numberOfInvocations() - 1;
                self::assertSame($jsonParts[$invocationIndex], $data);
                self::assertSame(BuildInfo::class, $type);
                self::assertSame('json', $format);
                self::assertSame([], $context);

                return null;
            })
        ;

        $stub = new BuildStream($stream, $serializer);

        $stub->wait();
    }

    public static function provideReadJsonEscapedDoubleQuoteCases(): iterable
    {
        return [
            [
                '{}{"abc":"def"}',
                ['{}', '{"abc":"def"}'],
            ],
            [
                '{"test": "abc\"\""}',
                ['{"test":"abc\"\""}'],
            ],
            [
                '{"test": "abc\"{{-}"}',
                ['{"test":"abc\"{{-}"}'],
            ],
        ];
    }
}
