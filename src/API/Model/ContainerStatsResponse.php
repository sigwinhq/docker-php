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

final class ContainerStatsResponse
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
     * ID of the container for which the stats were collected.
     *
     * @var null|string
     */
    private $id;
    /**
     * Name of the container for which the stats were collected.
     *
     * @var null|string
     */
    private $name;
    /**
     * OSType is the OS of the container ("linux" or "windows") to allow
     * platform-specific handling of stats.
     *
     * @var null|string
     */
    private $osType;
    /**
     * Date and time at which this sample was collected.
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     *
     * @var \DateTime
     */
    private $read;
    /**
     * CPU related info of the container.
     *
     * @var null|ContainerCPUStats
     */
    private $cpuStats;
    /**
     * Aggregates all memory stats since container inception on Linux.
     * Windows returns stats for commit and private working set only.
     *
     * @var ContainerMemoryStats
     */
    private $memoryStats;
    /**
     * Network statistics for the container per interface.
     *
     * This field is omitted if the container has no networking enabled.
     *
     * @var null|mixed
     */
    private $networks;
    /**
     * PidsStats contains Linux-specific stats of a container's process-IDs (PIDs).
     *
     * This type is Linux-specific and omitted for Windows containers.
     *
     * @var null|ContainerPidsStats
     */
    private $pidsStats;
    /**
     * BlkioStats stores all IO service stats for data read and write.
     *
     * This type is Linux-specific and holds many fields that are specific to cgroups v1.
     * On a cgroup v2 host, all fields other than `io_service_bytes_recursive`
     * are omitted or `null`.
     *
     * This type is only populated on Linux and omitted for Windows containers.
     *
     * @var null|ContainerBlkioStats
     */
    private $blkioStats;
    /**
     * The number of processors on the system.
     *
     * This field is Windows-specific and always zero for Linux containers.
     *
     * @var int
     */
    private $numProcs;
    /**
     * StorageStats is the disk I/O stats for read/write on Windows.
     *
     * This type is Windows-specific and omitted for Linux containers.
     *
     * @var null|ContainerStorageStats
     */
    private $storageStats;
    /**
     * Date and time at which this first sample was collected. This field
     * is not propagated if the "one-shot" option is set. If the "one-shot"
     * option is set, this field may be omitted, empty, or set to a default
     * date (`0001-01-01T00:00:00Z`).
     *
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     *
     * @var \DateTime
     */
    private $preread;
    /**
     * CPU related info of the container.
     *
     * @var null|ContainerCPUStats
     */
    private $precpuStats;

    /**
     * ID of the container for which the stats were collected.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * ID of the container for which the stats were collected.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Name of the container for which the stats were collected.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the container for which the stats were collected.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * OSType is the OS of the container ("linux" or "windows") to allow
     * platform-specific handling of stats.
     */
    public function getOsType(): ?string
    {
        return $this->osType;
    }

    /**
     * OSType is the OS of the container ("linux" or "windows") to allow
     * platform-specific handling of stats.
     */
    public function setOsType(?string $osType): self
    {
        $this->initialized['osType'] = true;
        $this->osType = $osType;

        return $this;
    }

    /**
     * Date and time at which this sample was collected.
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function getRead(): \DateTimeImmutable
    {
        return $this->read;
    }

    /**
     * Date and time at which this sample was collected.
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function setRead(\DateTimeImmutable $read): self
    {
        $this->initialized['read'] = true;
        $this->read = $read;

        return $this;
    }

    /**
     * CPU related info of the container.
     */
    public function getCpuStats(): ?ContainerCPUStats
    {
        return $this->cpuStats;
    }

    /**
     * CPU related info of the container.
     */
    public function setCpuStats(?ContainerCPUStats $cpuStats): self
    {
        $this->initialized['cpuStats'] = true;
        $this->cpuStats = $cpuStats;

        return $this;
    }

    /**
     * Aggregates all memory stats since container inception on Linux.
     * Windows returns stats for commit and private working set only.
     */
    public function getMemoryStats(): ContainerMemoryStats
    {
        return $this->memoryStats;
    }

    /**
     * Aggregates all memory stats since container inception on Linux.
     * Windows returns stats for commit and private working set only.
     */
    public function setMemoryStats(ContainerMemoryStats $memoryStats): self
    {
        $this->initialized['memoryStats'] = true;
        $this->memoryStats = $memoryStats;

        return $this;
    }

    /**
     * Network statistics for the container per interface.
     *
     * This field is omitted if the container has no networking enabled.
     */
    public function getNetworks(): mixed
    {
        return $this->networks;
    }

    /**
     * Network statistics for the container per interface.
     *
     * This field is omitted if the container has no networking enabled.
     */
    public function setNetworks($networks): self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;

        return $this;
    }

    /**
     * PidsStats contains Linux-specific stats of a container's process-IDs (PIDs).
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function getPidsStats(): ?ContainerPidsStats
    {
        return $this->pidsStats;
    }

    /**
     * PidsStats contains Linux-specific stats of a container's process-IDs (PIDs).
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function setPidsStats(?ContainerPidsStats $pidsStats): self
    {
        $this->initialized['pidsStats'] = true;
        $this->pidsStats = $pidsStats;

        return $this;
    }

    /**
     * BlkioStats stores all IO service stats for data read and write.
     *
     * This type is Linux-specific and holds many fields that are specific to cgroups v1.
     * On a cgroup v2 host, all fields other than `io_service_bytes_recursive`
     * are omitted or `null`.
     *
     * This type is only populated on Linux and omitted for Windows containers.
     */
    public function getBlkioStats(): ?ContainerBlkioStats
    {
        return $this->blkioStats;
    }

    /**
     * BlkioStats stores all IO service stats for data read and write.
     *
     * This type is Linux-specific and holds many fields that are specific to cgroups v1.
     * On a cgroup v2 host, all fields other than `io_service_bytes_recursive`
     * are omitted or `null`.
     *
     * This type is only populated on Linux and omitted for Windows containers.
     */
    public function setBlkioStats(?ContainerBlkioStats $blkioStats): self
    {
        $this->initialized['blkioStats'] = true;
        $this->blkioStats = $blkioStats;

        return $this;
    }

    /**
     * The number of processors on the system.
     *
     * This field is Windows-specific and always zero for Linux containers.
     */
    public function getNumProcs(): int
    {
        return $this->numProcs;
    }

    /**
     * The number of processors on the system.
     *
     * This field is Windows-specific and always zero for Linux containers.
     */
    public function setNumProcs(int $numProcs): self
    {
        $this->initialized['numProcs'] = true;
        $this->numProcs = $numProcs;

        return $this;
    }

    /**
     * StorageStats is the disk I/O stats for read/write on Windows.
     *
     * This type is Windows-specific and omitted for Linux containers.
     */
    public function getStorageStats(): ?ContainerStorageStats
    {
        return $this->storageStats;
    }

    /**
     * StorageStats is the disk I/O stats for read/write on Windows.
     *
     * This type is Windows-specific and omitted for Linux containers.
     */
    public function setStorageStats(?ContainerStorageStats $storageStats): self
    {
        $this->initialized['storageStats'] = true;
        $this->storageStats = $storageStats;

        return $this;
    }

    /**
     * Date and time at which this first sample was collected. This field
     * is not propagated if the "one-shot" option is set. If the "one-shot"
     * option is set, this field may be omitted, empty, or set to a default
     * date (`0001-01-01T00:00:00Z`).
     *
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function getPreread(): \DateTimeImmutable
    {
        return $this->preread;
    }

    /**
     * Date and time at which this first sample was collected. This field
     * is not propagated if the "one-shot" option is set. If the "one-shot"
     * option is set, this field may be omitted, empty, or set to a default
     * date (`0001-01-01T00:00:00Z`).
     *
     * The value is formatted as [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt)
     * with nano-seconds.
     */
    public function setPreread(\DateTimeImmutable $preread): self
    {
        $this->initialized['preread'] = true;
        $this->preread = $preread;

        return $this;
    }

    /**
     * CPU related info of the container.
     */
    public function getPrecpuStats(): ?ContainerCPUStats
    {
        return $this->precpuStats;
    }

    /**
     * CPU related info of the container.
     */
    public function setPrecpuStats(?ContainerCPUStats $precpuStats): self
    {
        $this->initialized['precpuStats'] = true;
        $this->precpuStats = $precpuStats;

        return $this;
    }
}
