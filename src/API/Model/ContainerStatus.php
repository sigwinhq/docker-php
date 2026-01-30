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

final class ContainerStatus
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
     * @var string
     */
    private $containerID;
    /**
     * @var int
     */
    private $pID;
    /**
     * @var int
     */
    private $exitCode;

    public function getContainerID(): string
    {
        return $this->containerID;
    }

    public function setContainerID(string $containerID): self
    {
        $this->initialized['containerID'] = true;
        $this->containerID = $containerID;

        return $this;
    }

    public function getPID(): int
    {
        return $this->pID;
    }

    public function setPID(int $pID): self
    {
        $this->initialized['pID'] = true;
        $this->pID = $pID;

        return $this;
    }

    public function getExitCode(): int
    {
        return $this->exitCode;
    }

    public function setExitCode(int $exitCode): self
    {
        $this->initialized['exitCode'] = true;
        $this->exitCode = $exitCode;

        return $this;
    }
}
