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

final class ContainerCPUUsage
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
     * Total CPU time consumed in nanoseconds (Linux) or 100's of nanoseconds (Windows).
     *
     * @var int
     */
    private $totalUsage;
    /**
     * Total CPU time (in nanoseconds) consumed per core (Linux).
     *
     * This field is Linux-specific when using cgroups v1. It is omitted
     * when using cgroups v2 and Windows containers.
     *
     * @var null|list<int>
     */
    private $percpuUsage;
    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in kernel mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     *
     * @var int
     */
    private $usageInKernelmode;
    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in user mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     *
     * @var int
     */
    private $usageInUsermode;

    /**
     * Total CPU time consumed in nanoseconds (Linux) or 100's of nanoseconds (Windows).
     */
    public function getTotalUsage(): int
    {
        return $this->totalUsage;
    }

    /**
     * Total CPU time consumed in nanoseconds (Linux) or 100's of nanoseconds (Windows).
     */
    public function setTotalUsage(int $totalUsage): self
    {
        $this->initialized['totalUsage'] = true;
        $this->totalUsage = $totalUsage;

        return $this;
    }

    /**
     * Total CPU time (in nanoseconds) consumed per core (Linux).
     *
     * This field is Linux-specific when using cgroups v1. It is omitted
     * when using cgroups v2 and Windows containers.
     *
     * @return null|list<int>
     */
    public function getPercpuUsage(): ?array
    {
        return $this->percpuUsage;
    }

    /**
     * Total CPU time (in nanoseconds) consumed per core (Linux).
     *
     * This field is Linux-specific when using cgroups v1. It is omitted
     * when using cgroups v2 and Windows containers.
     *
     * @param null|list<int> $percpuUsage
     */
    public function setPercpuUsage(?array $percpuUsage): self
    {
        $this->initialized['percpuUsage'] = true;
        $this->percpuUsage = $percpuUsage;

        return $this;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in kernel mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function getUsageInKernelmode(): int
    {
        return $this->usageInKernelmode;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in kernel mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function setUsageInKernelmode(int $usageInKernelmode): self
    {
        $this->initialized['usageInKernelmode'] = true;
        $this->usageInKernelmode = $usageInKernelmode;

        return $this;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in user mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function getUsageInUsermode(): int
    {
        return $this->usageInUsermode;
    }

    /**
     * Time (in nanoseconds) spent by tasks of the cgroup in user mode (Linux),
     * or time spent (in 100's of nanoseconds) by all container processes in
     * kernel mode (Windows).
     *
     * Not populated for Windows containers using Hyper-V isolation.
     */
    public function setUsageInUsermode(int $usageInUsermode): self
    {
        $this->initialized['usageInUsermode'] = true;
        $this->usageInUsermode = $usageInUsermode;

        return $this;
    }
}
