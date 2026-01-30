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

final class ProcessConfig
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
     * @var bool
     */
    private $privileged;
    /**
     * @var string
     */
    private $user;
    /**
     * @var bool
     */
    private $tty;
    /**
     * @var string
     */
    private $entrypoint;
    /**
     * @var list<string>
     */
    private $arguments;

    public function getPrivileged(): bool
    {
        return $this->privileged;
    }

    public function setPrivileged(bool $privileged): self
    {
        $this->initialized['privileged'] = true;
        $this->privileged = $privileged;

        return $this;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    public function getTty(): bool
    {
        return $this->tty;
    }

    public function setTty(bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;

        return $this;
    }

    public function getEntrypoint(): string
    {
        return $this->entrypoint;
    }

    public function setEntrypoint(string $entrypoint): self
    {
        $this->initialized['entrypoint'] = true;
        $this->entrypoint = $entrypoint;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @param list<string> $arguments
     */
    public function setArguments(array $arguments): self
    {
        $this->initialized['arguments'] = true;
        $this->arguments = $arguments;

        return $this;
    }
}
