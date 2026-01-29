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
use Docker\Stream\MultiJsonStream;
use Docker\Tests\TestCase;
use GuzzleHttp\Psr7\BufferStream;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @internal
 */
#[\PHPUnit\Framework\Attributes\CoversNothing]
#[\PHPUnit\Framework\Attributes\Small]
final class MultiJsonStreamTest extends TestCase
{
    #[\PHPUnit\Framework\Attributes\DataProvider('provideReadJsonEscapedDoubleQuoteCases')]
    public function testReadJsonEscapedDoubleQuote(string $jsonStream, array $jsonParts): void
    {
        $stream = new BufferStream();
        $stream->write($jsonStream);

        $serializer = $this->getMockBuilder(SerializerInterface::class)
            ->getMock()
        ;

        $serializer
            ->expects(self::exactly(\count($jsonParts)))
            ->method('deserialize')
                ->withConsecutive(...array_map(static function ($part) {
                    return [$part, BuildInfo::class, 'json', []];
                }, $jsonParts))
        ;

        $stub = $this->getMockForAbstractClass(MultiJsonStream::class, [$stream, $serializer]);
        $stub->expects(self::any())
            ->method('getDecodeClass')
            ->willReturn('BuildInfo')
        ;

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
