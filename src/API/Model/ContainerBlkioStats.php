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

final class ContainerBlkioStats
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
     * @var list<ContainerBlkioStatEntry>
     */
    private $ioServiceBytesRecursive;
    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @var null|list<ContainerBlkioStatEntry>
     */
    private $ioServicedRecursive;
    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @var null|list<ContainerBlkioStatEntry>
     */
    private $ioQueueRecursive;
    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @var null|list<ContainerBlkioStatEntry>
     */
    private $ioServiceTimeRecursive;
    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @var null|list<ContainerBlkioStatEntry>
     */
    private $ioWaitTimeRecursive;
    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @var null|list<ContainerBlkioStatEntry>
     */
    private $ioMergedRecursive;
    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @var null|list<ContainerBlkioStatEntry>
     */
    private $ioTimeRecursive;
    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @var null|list<ContainerBlkioStatEntry>
     */
    private $sectorsRecursive;

    /**
     * @return list<ContainerBlkioStatEntry>
     */
    public function getIoServiceBytesRecursive(): array
    {
        return $this->ioServiceBytesRecursive;
    }

    /**
     * @param list<ContainerBlkioStatEntry> $ioServiceBytesRecursive
     */
    public function setIoServiceBytesRecursive(array $ioServiceBytesRecursive): self
    {
        $this->initialized['ioServiceBytesRecursive'] = true;
        $this->ioServiceBytesRecursive = $ioServiceBytesRecursive;

        return $this;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @return null|list<ContainerBlkioStatEntry>
     */
    public function getIoServicedRecursive(): ?array
    {
        return $this->ioServicedRecursive;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @param null|list<ContainerBlkioStatEntry> $ioServicedRecursive
     */
    public function setIoServicedRecursive(?array $ioServicedRecursive): self
    {
        $this->initialized['ioServicedRecursive'] = true;
        $this->ioServicedRecursive = $ioServicedRecursive;

        return $this;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @return null|list<ContainerBlkioStatEntry>
     */
    public function getIoQueueRecursive(): ?array
    {
        return $this->ioQueueRecursive;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @param null|list<ContainerBlkioStatEntry> $ioQueueRecursive
     */
    public function setIoQueueRecursive(?array $ioQueueRecursive): self
    {
        $this->initialized['ioQueueRecursive'] = true;
        $this->ioQueueRecursive = $ioQueueRecursive;

        return $this;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @return null|list<ContainerBlkioStatEntry>
     */
    public function getIoServiceTimeRecursive(): ?array
    {
        return $this->ioServiceTimeRecursive;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @param null|list<ContainerBlkioStatEntry> $ioServiceTimeRecursive
     */
    public function setIoServiceTimeRecursive(?array $ioServiceTimeRecursive): self
    {
        $this->initialized['ioServiceTimeRecursive'] = true;
        $this->ioServiceTimeRecursive = $ioServiceTimeRecursive;

        return $this;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @return null|list<ContainerBlkioStatEntry>
     */
    public function getIoWaitTimeRecursive(): ?array
    {
        return $this->ioWaitTimeRecursive;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @param null|list<ContainerBlkioStatEntry> $ioWaitTimeRecursive
     */
    public function setIoWaitTimeRecursive(?array $ioWaitTimeRecursive): self
    {
        $this->initialized['ioWaitTimeRecursive'] = true;
        $this->ioWaitTimeRecursive = $ioWaitTimeRecursive;

        return $this;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @return null|list<ContainerBlkioStatEntry>
     */
    public function getIoMergedRecursive(): ?array
    {
        return $this->ioMergedRecursive;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @param null|list<ContainerBlkioStatEntry> $ioMergedRecursive
     */
    public function setIoMergedRecursive(?array $ioMergedRecursive): self
    {
        $this->initialized['ioMergedRecursive'] = true;
        $this->ioMergedRecursive = $ioMergedRecursive;

        return $this;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @return null|list<ContainerBlkioStatEntry>
     */
    public function getIoTimeRecursive(): ?array
    {
        return $this->ioTimeRecursive;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @param null|list<ContainerBlkioStatEntry> $ioTimeRecursive
     */
    public function setIoTimeRecursive(?array $ioTimeRecursive): self
    {
        $this->initialized['ioTimeRecursive'] = true;
        $this->ioTimeRecursive = $ioTimeRecursive;

        return $this;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @return null|list<ContainerBlkioStatEntry>
     */
    public function getSectorsRecursive(): ?array
    {
        return $this->sectorsRecursive;
    }

    /**
     * This field is only available when using Linux containers with
     * cgroups v1. It is omitted or `null` when using cgroups v2.
     *
     * @param null|list<ContainerBlkioStatEntry> $sectorsRecursive
     */
    public function setSectorsRecursive(?array $sectorsRecursive): self
    {
        $this->initialized['sectorsRecursive'] = true;
        $this->sectorsRecursive = $sectorsRecursive;

        return $this;
    }
}
