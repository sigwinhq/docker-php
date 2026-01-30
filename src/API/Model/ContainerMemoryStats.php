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

final class ContainerMemoryStats
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
     * Current `res_counter` usage for memory.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var null|int
     */
    private $usage;
    /**
     * Maximum usage ever recorded.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     *
     * @var null|int
     */
    private $maxUsage;
    /**
     * All the stats exported via memory.stat.
     *
     * The fields in this object differ between cgroups v1 and v2.
     * On cgroups v1, fields such as `cache`, `rss`, `mapped_file` are available.
     * On cgroups v2, fields such as `file`, `anon`, `inactive_file` are available.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var array<string, int>
     */
    private $stats;
    /**
     * Number of times memory usage hits limits.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     *
     * @var null|int
     */
    private $failcnt;
    /**
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var null|int
     */
    private $limit;
    /**
     * Committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var null|int
     */
    private $commitbytes;
    /**
     * Peak committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var null|int
     */
    private $commitpeakbytes;
    /**
     * Private working set.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var null|int
     */
    private $privateworkingset;

    /**
     * Current `res_counter` usage for memory.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getUsage(): ?int
    {
        return $this->usage;
    }

    /**
     * Current `res_counter` usage for memory.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setUsage(?int $usage): self
    {
        $this->initialized['usage'] = true;
        $this->usage = $usage;

        return $this;
    }

    /**
     * Maximum usage ever recorded.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function getMaxUsage(): ?int
    {
        return $this->maxUsage;
    }

    /**
     * Maximum usage ever recorded.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function setMaxUsage(?int $maxUsage): self
    {
        $this->initialized['maxUsage'] = true;
        $this->maxUsage = $maxUsage;

        return $this;
    }

    /**
     * All the stats exported via memory.stat.
     *
     * The fields in this object differ between cgroups v1 and v2.
     * On cgroups v1, fields such as `cache`, `rss`, `mapped_file` are available.
     * On cgroups v2, fields such as `file`, `anon`, `inactive_file` are available.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @return array<string, int>
     */
    public function getStats(): iterable
    {
        return $this->stats;
    }

    /**
     * All the stats exported via memory.stat.
     *
     * The fields in this object differ between cgroups v1 and v2.
     * On cgroups v1, fields such as `cache`, `rss`, `mapped_file` are available.
     * On cgroups v2, fields such as `file`, `anon`, `inactive_file` are available.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @param array<string, int> $stats
     */
    public function setStats(iterable $stats): self
    {
        $this->initialized['stats'] = true;
        $this->stats = $stats;

        return $this;
    }

    /**
     * Number of times memory usage hits limits.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function getFailcnt(): ?int
    {
        return $this->failcnt;
    }

    /**
     * Number of times memory usage hits limits.
     *
     * This field is Linux-specific and only supported on cgroups v1.
     * It is omitted when using cgroups v2 and for Windows containers.
     */
    public function setFailcnt(?int $failcnt): self
    {
        $this->initialized['failcnt'] = true;
        $this->failcnt = $failcnt;

        return $this;
    }

    /**
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;

        return $this;
    }

    /**
     * Committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getCommitbytes(): ?int
    {
        return $this->commitbytes;
    }

    /**
     * Committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setCommitbytes(?int $commitbytes): self
    {
        $this->initialized['commitbytes'] = true;
        $this->commitbytes = $commitbytes;

        return $this;
    }

    /**
     * Peak committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getCommitpeakbytes(): ?int
    {
        return $this->commitpeakbytes;
    }

    /**
     * Peak committed bytes.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setCommitpeakbytes(?int $commitpeakbytes): self
    {
        $this->initialized['commitpeakbytes'] = true;
        $this->commitpeakbytes = $commitpeakbytes;

        return $this;
    }

    /**
     * Private working set.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getPrivateworkingset(): ?int
    {
        return $this->privateworkingset;
    }

    /**
     * Private working set.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setPrivateworkingset(?int $privateworkingset): self
    {
        $this->initialized['privateworkingset'] = true;
        $this->privateworkingset = $privateworkingset;

        return $this;
    }
}
