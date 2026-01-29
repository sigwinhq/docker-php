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

use Amp\ByteStream\InputStream;
use Amp\CancellationTokenSource;
use Amp\Promise;

use function Amp\call;

final class ArtaxCallbackStream
{
    private $stream;
    private $onNewFrameCallables = [];
    private $chunkTransformer;
    private $cancellationTokenSource;

    public function __construct(
        InputStream $stream,
        CancellationTokenSource $cancellationTokenSource,
        ?callable $chunkTransformer,
    ) {
        $this->stream = $stream;
        $this->cancellationTokenSource = $cancellationTokenSource;
        $this->chunkTransformer = $chunkTransformer;
    }

    /**
     * Called when there is a new frame from the stream.
     */
    public function onFrame(callable $onNewFrame): void
    {
        $this->onNewFrameCallables[] = $onNewFrame;
    }

    /**
     * Consume stream chunks.
     */
    public function listen(): Promise
    {
        return call(function () {
            while (($chunk = yield $this->stream->read()) !== null) {
                foreach ($this->onNewFrameCallables as $newFrameCallable) {
                    $newFrameCallable($this->transformChunk($chunk));
                }
            }
        });
    }

    /**
     * Stop consuming stream chunks.
     */
    public function cancel(): void
    {
        $this->cancellationTokenSource->cancel();
    }

    /**
     * Transform stream chunks if required.
     *
     * @return mixed The raw chunk or the transformed chunk
     */
    private function transformChunk(string $chunk): mixed
    {
        if ($this->chunkTransformer === null) {
            return $chunk;
        }

        return \call_user_func($this->chunkTransformer, $chunk);
    }
}
