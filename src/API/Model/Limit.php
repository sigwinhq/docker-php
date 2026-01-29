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

final class Limit
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
     * @var int
     */
    private $nanoCPUs;
    /**
     * @var int
     */
    private $memoryBytes;
    /**
     * Limits the maximum number of PIDs in the container. Set `0` for unlimited.
     *
     * @var int
     */
    private $pids = 0;

    public function getNanoCPUs(): int
    {
        return $this->nanoCPUs;
    }

    public function setNanoCPUs(int $nanoCPUs): self
    {
        $this->initialized['nanoCPUs'] = true;
        $this->nanoCPUs = $nanoCPUs;

        return $this;
    }

    public function getMemoryBytes(): int
    {
        return $this->memoryBytes;
    }

    public function setMemoryBytes(int $memoryBytes): self
    {
        $this->initialized['memoryBytes'] = true;
        $this->memoryBytes = $memoryBytes;

        return $this;
    }

    /**
     * Limits the maximum number of PIDs in the container. Set `0` for unlimited.
     */
    public function getPids(): int
    {
        return $this->pids;
    }

    /**
     * Limits the maximum number of PIDs in the container. Set `0` for unlimited.
     */
    public function setPids(int $pids): self
    {
        $this->initialized['pids'] = true;
        $this->pids = $pids;

        return $this;
    }
}
