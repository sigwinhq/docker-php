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

namespace Docker\Stream;

use Psr\Http\Message\StreamInterface;

abstract class CallbackStream
{
    protected $stream;

    private $onNewFrameCallables = [];

    public function __construct(StreamInterface $stream)
    {
        $this->stream = $stream;
    }

    /**
     * Called when there is a new frame from the stream.
     */
    public function onFrame(callable $onNewFrame): void
    {
        $this->onNewFrameCallables[] = $onNewFrame;
    }

    /**
     * Read a frame in the stream.
     */
    abstract protected function readFrame(): mixed;

    /**
     * Wait for stream to finish and call callables if defined.
     */
    public function wait(): void
    {
        while (! $this->stream->eof()) {
            $frame = $this->readFrame();

            if ($frame !== null) {
                if (! \is_array($frame)) {
                    $frame = [$frame];
                }

                foreach ($this->onNewFrameCallables as $newFrameCallable) {
                    \call_user_func_array($newFrameCallable, $frame);
                }
            }
        }
    }

    public function closeAndRead(): void
    {
        $this->stream->close();
        $this->wait();
    }
}
