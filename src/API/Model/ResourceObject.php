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

final class ResourceObject
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
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @var list<GenericResourcesItem>
     */
    private $genericResources;

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
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @return list<GenericResourcesItem>
     */
    public function getGenericResources(): array
    {
        return $this->genericResources;
    }

    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @param list<GenericResourcesItem> $genericResources
     */
    public function setGenericResources(array $genericResources): self
    {
        $this->initialized['genericResources'] = true;
        $this->genericResources = $genericResources;

        return $this;
    }
}
