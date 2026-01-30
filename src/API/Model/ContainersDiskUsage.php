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

final class ContainersDiskUsage
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
     * Count of active containers.
     *
     * @var int
     */
    private $activeCount;
    /**
     * Count of all containers.
     *
     * @var int
     */
    private $totalCount;
    /**
     * Disk space that can be reclaimed by removing inactive containers.
     *
     * @var int
     */
    private $reclaimable;
    /**
     * Disk space in use by containers.
     *
     * @var int
     */
    private $totalSize;
    /**
     * List of container summaries.
     *
     * @var list<mixed>
     */
    private $items;

    /**
     * Count of active containers.
     */
    public function getActiveCount(): int
    {
        return $this->activeCount;
    }

    /**
     * Count of active containers.
     */
    public function setActiveCount(int $activeCount): self
    {
        $this->initialized['activeCount'] = true;
        $this->activeCount = $activeCount;

        return $this;
    }

    /**
     * Count of all containers.
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * Count of all containers.
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->initialized['totalCount'] = true;
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * Disk space that can be reclaimed by removing inactive containers.
     */
    public function getReclaimable(): int
    {
        return $this->reclaimable;
    }

    /**
     * Disk space that can be reclaimed by removing inactive containers.
     */
    public function setReclaimable(int $reclaimable): self
    {
        $this->initialized['reclaimable'] = true;
        $this->reclaimable = $reclaimable;

        return $this;
    }

    /**
     * Disk space in use by containers.
     */
    public function getTotalSize(): int
    {
        return $this->totalSize;
    }

    /**
     * Disk space in use by containers.
     */
    public function setTotalSize(int $totalSize): self
    {
        $this->initialized['totalSize'] = true;
        $this->totalSize = $totalSize;

        return $this;
    }

    /**
     * List of container summaries.
     *
     * @return list<mixed>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * List of container summaries.
     *
     * @param list<mixed> $items
     */
    public function setItems(array $items): self
    {
        $this->initialized['items'] = true;
        $this->items = $items;

        return $this;
    }
}
