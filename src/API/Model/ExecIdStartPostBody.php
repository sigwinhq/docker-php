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

namespace Docker\API\Model;

final class ExecIdStartPostBody
{
    /**
     * @var array
     */
    private $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Detach from the command.
     *
     * @var bool
     */
    private $detach;
    /**
     * Allocate a pseudo-TTY.
     *
     * @var bool
     */
    private $tty;
    /**
     * Initial console size, as an `[height, width]` array.
     *
     * @var null|list<int>
     */
    private $consoleSize;

    /**
     * Detach from the command.
     */
    public function getDetach(): bool
    {
        return $this->detach;
    }

    /**
     * Detach from the command.
     */
    public function setDetach(bool $detach): self
    {
        $this->initialized['detach'] = true;
        $this->detach = $detach;

        return $this;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function getTty(): bool
    {
        return $this->tty;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function setTty(bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }

    /**
     * Initial console size, as an `[height, width]` array.
     *
     * @return null|list<int>
     */
    public function getConsoleSize(): ?array
    {
        return $this->consoleSize;
    }

    /**
     * Initial console size, as an `[height, width]` array.
     *
     * @param null|list<int> $consoleSize
     */
    public function setConsoleSize(?array $consoleSize): self
    {
        $this->initialized['consoleSize'] = true;
        $this->consoleSize = $consoleSize;

        return $this;
    }
}
