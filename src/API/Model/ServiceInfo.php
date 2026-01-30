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

final class ServiceInfo
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
    private $vIP;
    /**
     * @var list<string>
     */
    private $ports;
    /**
     * @var int
     */
    private $localLBIndex;
    /**
     * @var list<NetworkTaskInfo>
     */
    private $tasks;

    public function getVIP(): string
    {
        return $this->vIP;
    }

    public function setVIP(string $vIP): self
    {
        $this->initialized['vIP'] = true;
        $this->vIP = $vIP;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * @param list<string> $ports
     */
    public function setPorts(array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }

    public function getLocalLBIndex(): int
    {
        return $this->localLBIndex;
    }

    public function setLocalLBIndex(int $localLBIndex): self
    {
        $this->initialized['localLBIndex'] = true;
        $this->localLBIndex = $localLBIndex;

        return $this;
    }

    /**
     * @return list<NetworkTaskInfo>
     */
    public function getTasks(): array
    {
        return $this->tasks;
    }

    /**
     * @param list<NetworkTaskInfo> $tasks
     */
    public function setTasks(array $tasks): self
    {
        $this->initialized['tasks'] = true;
        $this->tasks = $tasks;

        return $this;
    }
}
