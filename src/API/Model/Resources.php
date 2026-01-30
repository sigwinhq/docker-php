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

final class Resources
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
     * An integer value representing this container's relative CPU weight
     * versus other containers.
     *
     * @var int
     */
    private $cpuShares;
    /**
     * Memory limit in bytes.
     *
     * @var int
     */
    private $memory = 0;
    /**
     * Path to `cgroups` under which the container's `cgroup` is created. If
     * the path is not absolute, the path is considered to be relative to the
     * `cgroups` path of the init process. Cgroups are created if they do not
     * already exist.
     *
     * @var string
     */
    private $cgroupParent;
    /**
     * Block IO weight (relative weight).
     *
     * @var int
     */
    private $blkioWeight;
    /**
     * Block IO weight (relative device weight) in the form:
     *
     * ```
     * [{"Path": "device_path", "Weight": weight}]
     * ```
     *
     * @var list<ResourcesBlkioWeightDeviceItem>
     */
    private $blkioWeightDevice;
    /**
     * Limit read rate (bytes per second) from a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @var list<ThrottleDevice>
     */
    private $blkioDeviceReadBps;
    /**
     * Limit write rate (bytes per second) to a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @var list<ThrottleDevice>
     */
    private $blkioDeviceWriteBps;
    /**
     * Limit read rate (IO per second) from a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @var list<ThrottleDevice>
     */
    private $blkioDeviceReadIOps;
    /**
     * Limit write rate (IO per second) to a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @var list<ThrottleDevice>
     */
    private $blkioDeviceWriteIOps;
    /**
     * The length of a CPU period in microseconds.
     *
     * @var int
     */
    private $cpuPeriod;
    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     *
     * @var int
     */
    private $cpuQuota;
    /**
     * The length of a CPU real-time period in microseconds. Set to 0 to
     * allocate no time allocated to real-time tasks.
     *
     * @var int
     */
    private $cpuRealtimePeriod;
    /**
     * The length of a CPU real-time runtime in microseconds. Set to 0 to
     * allocate no time allocated to real-time tasks.
     *
     * @var int
     */
    private $cpuRealtimeRuntime;
    /**
     * CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     *
     * @var string
     */
    private $cpusetCpus;
    /**
     * Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only
     * effective on NUMA systems.
     *
     * @var string
     */
    private $cpusetMems;
    /**
     * A list of devices to add to the container.
     *
     * @var list<DeviceMapping>
     */
    private $devices;
    /**
     * a list of cgroup rules to apply to the container.
     *
     * @var list<string>
     */
    private $deviceCgroupRules;
    /**
     * A list of requests for devices to be sent to device drivers.
     *
     * @var list<DeviceRequest>
     */
    private $deviceRequests;
    /**
     * Memory soft limit in bytes.
     *
     * @var int
     */
    private $memoryReservation;
    /**
     * Total memory limit (memory + swap). Set as `-1` to enable unlimited
     * swap.
     *
     * @var int
     */
    private $memorySwap;
    /**
     * Tune a container's memory swappiness behavior. Accepts an integer
     * between 0 and 100.
     *
     * @var int
     */
    private $memorySwappiness;
    /**
     * CPU quota in units of 10<sup>-9</sup> CPUs.
     *
     * @var int
     */
    private $nanoCpus;
    /**
     * Disable OOM Killer for the container.
     *
     * @var bool
     */
    private $oomKillDisable;
    /**
     * Run an init inside the container that forwards signals and reaps
     * processes. This field is omitted if empty, and the default (as
     * configured on the daemon) is used.
     *
     * @var null|bool
     */
    private $init;
    /**
     * Tune a container's PIDs limit. Set `0` or `-1` for unlimited, or `null`
     * to not change.
     *
     * @var null|int
     */
    private $pidsLimit;
    /**
     * A list of resource limits to set in the container. For example:
     *
     * ```
     * {"Name": "nofile", "Soft": 1024, "Hard": 2048}
     * ```
     *
     * @var list<ResourcesUlimitsItem>
     */
    private $ulimits;
    /**
     * The number of usable CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are
     * mutually exclusive. The order of precedence is `CPUCount` first, then
     * `CPUShares`, and `CPUPercent` last.
     *
     * @var int
     */
    private $cpuCount;
    /**
     * The usable percentage of the available CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are
     * mutually exclusive. The order of precedence is `CPUCount` first, then
     * `CPUShares`, and `CPUPercent` last.
     *
     * @var int
     */
    private $cpuPercent;
    /**
     * Maximum IOps for the container system drive (Windows only).
     *
     * @var int
     */
    private $iOMaximumIOps;
    /**
     * Maximum IO in bytes per second for the container system drive
     * (Windows only).
     *
     * @var int
     */
    private $iOMaximumBandwidth;

    /**
     * An integer value representing this container's relative CPU weight
     * versus other containers.
     */
    public function getCpuShares(): int
    {
        return $this->cpuShares;
    }

    /**
     * An integer value representing this container's relative CPU weight
     * versus other containers.
     */
    public function setCpuShares(int $cpuShares): self
    {
        $this->initialized['cpuShares'] = true;
        $this->cpuShares = $cpuShares;

        return $this;
    }

    /**
     * Memory limit in bytes.
     */
    public function getMemory(): int
    {
        return $this->memory;
    }

    /**
     * Memory limit in bytes.
     */
    public function setMemory(int $memory): self
    {
        $this->initialized['memory'] = true;
        $this->memory = $memory;

        return $this;
    }

    /**
     * Path to `cgroups` under which the container's `cgroup` is created. If
     * the path is not absolute, the path is considered to be relative to the
     * `cgroups` path of the init process. Cgroups are created if they do not
     * already exist.
     */
    public function getCgroupParent(): string
    {
        return $this->cgroupParent;
    }

    /**
     * Path to `cgroups` under which the container's `cgroup` is created. If
     * the path is not absolute, the path is considered to be relative to the
     * `cgroups` path of the init process. Cgroups are created if they do not
     * already exist.
     */
    public function setCgroupParent(string $cgroupParent): self
    {
        $this->initialized['cgroupParent'] = true;
        $this->cgroupParent = $cgroupParent;

        return $this;
    }

    /**
     * Block IO weight (relative weight).
     */
    public function getBlkioWeight(): int
    {
        return $this->blkioWeight;
    }

    /**
     * Block IO weight (relative weight).
     */
    public function setBlkioWeight(int $blkioWeight): self
    {
        $this->initialized['blkioWeight'] = true;
        $this->blkioWeight = $blkioWeight;

        return $this;
    }

    /**
     * Block IO weight (relative device weight) in the form:
     *
     * ```
     * [{"Path": "device_path", "Weight": weight}]
     * ```
     *
     * @return list<ResourcesBlkioWeightDeviceItem>
     */
    public function getBlkioWeightDevice(): array
    {
        return $this->blkioWeightDevice;
    }

    /**
     * Block IO weight (relative device weight) in the form:
     *
     * ```
     * [{"Path": "device_path", "Weight": weight}]
     * ```
     *
     * @param list<ResourcesBlkioWeightDeviceItem> $blkioWeightDevice
     */
    public function setBlkioWeightDevice(array $blkioWeightDevice): self
    {
        $this->initialized['blkioWeightDevice'] = true;
        $this->blkioWeightDevice = $blkioWeightDevice;

        return $this;
    }

    /**
     * Limit read rate (bytes per second) from a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceReadBps(): array
    {
        return $this->blkioDeviceReadBps;
    }

    /**
     * Limit read rate (bytes per second) from a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @param list<ThrottleDevice> $blkioDeviceReadBps
     */
    public function setBlkioDeviceReadBps(array $blkioDeviceReadBps): self
    {
        $this->initialized['blkioDeviceReadBps'] = true;
        $this->blkioDeviceReadBps = $blkioDeviceReadBps;

        return $this;
    }

    /**
     * Limit write rate (bytes per second) to a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceWriteBps(): array
    {
        return $this->blkioDeviceWriteBps;
    }

    /**
     * Limit write rate (bytes per second) to a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @param list<ThrottleDevice> $blkioDeviceWriteBps
     */
    public function setBlkioDeviceWriteBps(array $blkioDeviceWriteBps): self
    {
        $this->initialized['blkioDeviceWriteBps'] = true;
        $this->blkioDeviceWriteBps = $blkioDeviceWriteBps;

        return $this;
    }

    /**
     * Limit read rate (IO per second) from a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceReadIOps(): array
    {
        return $this->blkioDeviceReadIOps;
    }

    /**
     * Limit read rate (IO per second) from a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @param list<ThrottleDevice> $blkioDeviceReadIOps
     */
    public function setBlkioDeviceReadIOps(array $blkioDeviceReadIOps): self
    {
        $this->initialized['blkioDeviceReadIOps'] = true;
        $this->blkioDeviceReadIOps = $blkioDeviceReadIOps;

        return $this;
    }

    /**
     * Limit write rate (IO per second) to a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceWriteIOps(): array
    {
        return $this->blkioDeviceWriteIOps;
    }

    /**
     * Limit write rate (IO per second) to a device, in the form:
     *
     * ```
     * [{"Path": "device_path", "Rate": rate}]
     * ```
     *
     * @param list<ThrottleDevice> $blkioDeviceWriteIOps
     */
    public function setBlkioDeviceWriteIOps(array $blkioDeviceWriteIOps): self
    {
        $this->initialized['blkioDeviceWriteIOps'] = true;
        $this->blkioDeviceWriteIOps = $blkioDeviceWriteIOps;

        return $this;
    }

    /**
     * The length of a CPU period in microseconds.
     */
    public function getCpuPeriod(): int
    {
        return $this->cpuPeriod;
    }

    /**
     * The length of a CPU period in microseconds.
     */
    public function setCpuPeriod(int $cpuPeriod): self
    {
        $this->initialized['cpuPeriod'] = true;
        $this->cpuPeriod = $cpuPeriod;

        return $this;
    }

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     */
    public function getCpuQuota(): int
    {
        return $this->cpuQuota;
    }

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     */
    public function setCpuQuota(int $cpuQuota): self
    {
        $this->initialized['cpuQuota'] = true;
        $this->cpuQuota = $cpuQuota;

        return $this;
    }

    /**
     * The length of a CPU real-time period in microseconds. Set to 0 to
     * allocate no time allocated to real-time tasks.
     */
    public function getCpuRealtimePeriod(): int
    {
        return $this->cpuRealtimePeriod;
    }

    /**
     * The length of a CPU real-time period in microseconds. Set to 0 to
     * allocate no time allocated to real-time tasks.
     */
    public function setCpuRealtimePeriod(int $cpuRealtimePeriod): self
    {
        $this->initialized['cpuRealtimePeriod'] = true;
        $this->cpuRealtimePeriod = $cpuRealtimePeriod;

        return $this;
    }

    /**
     * The length of a CPU real-time runtime in microseconds. Set to 0 to
     * allocate no time allocated to real-time tasks.
     */
    public function getCpuRealtimeRuntime(): int
    {
        return $this->cpuRealtimeRuntime;
    }

    /**
     * The length of a CPU real-time runtime in microseconds. Set to 0 to
     * allocate no time allocated to real-time tasks.
     */
    public function setCpuRealtimeRuntime(int $cpuRealtimeRuntime): self
    {
        $this->initialized['cpuRealtimeRuntime'] = true;
        $this->cpuRealtimeRuntime = $cpuRealtimeRuntime;

        return $this;
    }

    /**
     * CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     */
    public function getCpusetCpus(): string
    {
        return $this->cpusetCpus;
    }

    /**
     * CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     */
    public function setCpusetCpus(string $cpusetCpus): self
    {
        $this->initialized['cpusetCpus'] = true;
        $this->cpusetCpus = $cpusetCpus;

        return $this;
    }

    /**
     * Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only
     * effective on NUMA systems.
     */
    public function getCpusetMems(): string
    {
        return $this->cpusetMems;
    }

    /**
     * Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only
     * effective on NUMA systems.
     */
    public function setCpusetMems(string $cpusetMems): self
    {
        $this->initialized['cpusetMems'] = true;
        $this->cpusetMems = $cpusetMems;

        return $this;
    }

    /**
     * A list of devices to add to the container.
     *
     * @return list<DeviceMapping>
     */
    public function getDevices(): array
    {
        return $this->devices;
    }

    /**
     * A list of devices to add to the container.
     *
     * @param list<DeviceMapping> $devices
     */
    public function setDevices(array $devices): self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;

        return $this;
    }

    /**
     * a list of cgroup rules to apply to the container.
     *
     * @return list<string>
     */
    public function getDeviceCgroupRules(): array
    {
        return $this->deviceCgroupRules;
    }

    /**
     * a list of cgroup rules to apply to the container.
     *
     * @param list<string> $deviceCgroupRules
     */
    public function setDeviceCgroupRules(array $deviceCgroupRules): self
    {
        $this->initialized['deviceCgroupRules'] = true;
        $this->deviceCgroupRules = $deviceCgroupRules;

        return $this;
    }

    /**
     * A list of requests for devices to be sent to device drivers.
     *
     * @return list<DeviceRequest>
     */
    public function getDeviceRequests(): array
    {
        return $this->deviceRequests;
    }

    /**
     * A list of requests for devices to be sent to device drivers.
     *
     * @param list<DeviceRequest> $deviceRequests
     */
    public function setDeviceRequests(array $deviceRequests): self
    {
        $this->initialized['deviceRequests'] = true;
        $this->deviceRequests = $deviceRequests;

        return $this;
    }

    /**
     * Memory soft limit in bytes.
     */
    public function getMemoryReservation(): int
    {
        return $this->memoryReservation;
    }

    /**
     * Memory soft limit in bytes.
     */
    public function setMemoryReservation(int $memoryReservation): self
    {
        $this->initialized['memoryReservation'] = true;
        $this->memoryReservation = $memoryReservation;

        return $this;
    }

    /**
     * Total memory limit (memory + swap). Set as `-1` to enable unlimited
     * swap.
     */
    public function getMemorySwap(): int
    {
        return $this->memorySwap;
    }

    /**
     * Total memory limit (memory + swap). Set as `-1` to enable unlimited
     * swap.
     */
    public function setMemorySwap(int $memorySwap): self
    {
        $this->initialized['memorySwap'] = true;
        $this->memorySwap = $memorySwap;

        return $this;
    }

    /**
     * Tune a container's memory swappiness behavior. Accepts an integer
     * between 0 and 100.
     */
    public function getMemorySwappiness(): int
    {
        return $this->memorySwappiness;
    }

    /**
     * Tune a container's memory swappiness behavior. Accepts an integer
     * between 0 and 100.
     */
    public function setMemorySwappiness(int $memorySwappiness): self
    {
        $this->initialized['memorySwappiness'] = true;
        $this->memorySwappiness = $memorySwappiness;

        return $this;
    }

    /**
     * CPU quota in units of 10<sup>-9</sup> CPUs.
     */
    public function getNanoCpus(): int
    {
        return $this->nanoCpus;
    }

    /**
     * CPU quota in units of 10<sup>-9</sup> CPUs.
     */
    public function setNanoCpus(int $nanoCpus): self
    {
        $this->initialized['nanoCpus'] = true;
        $this->nanoCpus = $nanoCpus;

        return $this;
    }

    /**
     * Disable OOM Killer for the container.
     */
    public function getOomKillDisable(): bool
    {
        return $this->oomKillDisable;
    }

    /**
     * Disable OOM Killer for the container.
     */
    public function setOomKillDisable(bool $oomKillDisable): self
    {
        $this->initialized['oomKillDisable'] = true;
        $this->oomKillDisable = $oomKillDisable;

        return $this;
    }

    /**
     * Run an init inside the container that forwards signals and reaps
     * processes. This field is omitted if empty, and the default (as
     * configured on the daemon) is used.
     */
    public function getInit(): ?bool
    {
        return $this->init;
    }

    /**
     * Run an init inside the container that forwards signals and reaps
     * processes. This field is omitted if empty, and the default (as
     * configured on the daemon) is used.
     */
    public function setInit(?bool $init): self
    {
        $this->initialized['init'] = true;
        $this->init = $init;

        return $this;
    }

    /**
     * Tune a container's PIDs limit. Set `0` or `-1` for unlimited, or `null`
     * to not change.
     */
    public function getPidsLimit(): ?int
    {
        return $this->pidsLimit;
    }

    /**
     * Tune a container's PIDs limit. Set `0` or `-1` for unlimited, or `null`
     * to not change.
     */
    public function setPidsLimit(?int $pidsLimit): self
    {
        $this->initialized['pidsLimit'] = true;
        $this->pidsLimit = $pidsLimit;

        return $this;
    }

    /**
     * A list of resource limits to set in the container. For example:
     *
     * ```
     * {"Name": "nofile", "Soft": 1024, "Hard": 2048}
     * ```
     *
     * @return list<ResourcesUlimitsItem>
     */
    public function getUlimits(): array
    {
        return $this->ulimits;
    }

    /**
     * A list of resource limits to set in the container. For example:
     *
     * ```
     * {"Name": "nofile", "Soft": 1024, "Hard": 2048}
     * ```
     *
     * @param list<ResourcesUlimitsItem> $ulimits
     */
    public function setUlimits(array $ulimits): self
    {
        $this->initialized['ulimits'] = true;
        $this->ulimits = $ulimits;

        return $this;
    }

    /**
     * The number of usable CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are
     * mutually exclusive. The order of precedence is `CPUCount` first, then
     * `CPUShares`, and `CPUPercent` last.
     */
    public function getCpuCount(): int
    {
        return $this->cpuCount;
    }

    /**
     * The number of usable CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are
     * mutually exclusive. The order of precedence is `CPUCount` first, then
     * `CPUShares`, and `CPUPercent` last.
     */
    public function setCpuCount(int $cpuCount): self
    {
        $this->initialized['cpuCount'] = true;
        $this->cpuCount = $cpuCount;

        return $this;
    }

    /**
     * The usable percentage of the available CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are
     * mutually exclusive. The order of precedence is `CPUCount` first, then
     * `CPUShares`, and `CPUPercent` last.
     */
    public function getCpuPercent(): int
    {
        return $this->cpuPercent;
    }

    /**
     * The usable percentage of the available CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are
     * mutually exclusive. The order of precedence is `CPUCount` first, then
     * `CPUShares`, and `CPUPercent` last.
     */
    public function setCpuPercent(int $cpuPercent): self
    {
        $this->initialized['cpuPercent'] = true;
        $this->cpuPercent = $cpuPercent;

        return $this;
    }

    /**
     * Maximum IOps for the container system drive (Windows only).
     */
    public function getIOMaximumIOps(): int
    {
        return $this->iOMaximumIOps;
    }

    /**
     * Maximum IOps for the container system drive (Windows only).
     */
    public function setIOMaximumIOps(int $iOMaximumIOps): self
    {
        $this->initialized['iOMaximumIOps'] = true;
        $this->iOMaximumIOps = $iOMaximumIOps;

        return $this;
    }

    /**
     * Maximum IO in bytes per second for the container system drive
     * (Windows only).
     */
    public function getIOMaximumBandwidth(): int
    {
        return $this->iOMaximumBandwidth;
    }

    /**
     * Maximum IO in bytes per second for the container system drive
     * (Windows only).
     */
    public function setIOMaximumBandwidth(int $iOMaximumBandwidth): self
    {
        $this->initialized['iOMaximumBandwidth'] = true;
        $this->iOMaximumBandwidth = $iOMaximumBandwidth;

        return $this;
    }
}
