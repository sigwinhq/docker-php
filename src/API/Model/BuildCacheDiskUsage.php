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

final class BuildCacheDiskUsage
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
     * Count of active build cache records.
     *
     * @var int
     */
    private $activeCount;
    /**
     * Count of all build cache records.
     *
     * @var int
     */
    private $totalCount;
    /**
     * Disk space that can be reclaimed by removing inactive build cache records.
     *
     * @var int
     */
    private $reclaimable;
    /**
     * Disk space in use by build cache records.
     *
     * @var int
     */
    private $totalSize;
    /**
     * List of build cache records.
     *
     * @var list<mixed>
     */
    private $items;

    /**
     * Count of active build cache records.
     */
    public function getActiveCount(): int
    {
        return $this->activeCount;
    }

    /**
     * Count of active build cache records.
     */
    public function setActiveCount(int $activeCount): self
    {
        $this->initialized['activeCount'] = true;
        $this->activeCount = $activeCount;

        return $this;
    }

    /**
     * Count of all build cache records.
     */
    public function getTotalCount(): int
    {
        return $this->totalCount;
    }

    /**
     * Count of all build cache records.
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->initialized['totalCount'] = true;
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * Disk space that can be reclaimed by removing inactive build cache records.
     */
    public function getReclaimable(): int
    {
        return $this->reclaimable;
    }

    /**
     * Disk space that can be reclaimed by removing inactive build cache records.
     */
    public function setReclaimable(int $reclaimable): self
    {
        $this->initialized['reclaimable'] = true;
        $this->reclaimable = $reclaimable;

        return $this;
    }

    /**
     * Disk space in use by build cache records.
     */
    public function getTotalSize(): int
    {
        return $this->totalSize;
    }

    /**
     * Disk space in use by build cache records.
     */
    public function setTotalSize(int $totalSize): self
    {
        $this->initialized['totalSize'] = true;
        $this->totalSize = $totalSize;

        return $this;
    }

    /**
     * List of build cache records.
     *
     * @return list<mixed>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * List of build cache records.
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
