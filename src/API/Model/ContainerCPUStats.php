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

final class ContainerCPUStats
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
     * All CPU stats aggregated since container inception.
     *
     * @var null|ContainerCPUUsage
     */
    private $cpuUsage;
    /**
     * System Usage.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var null|int
     */
    private $systemCpuUsage;
    /**
     * Number of online CPUs.
     *
     * This field is Linux-specific and omitted for Windows containers.
     *
     * @var null|int
     */
    private $onlineCpus;
    /**
     * CPU throttling stats of the container.
     *
     * This type is Linux-specific and omitted for Windows containers.
     *
     * @var null|ContainerThrottlingData
     */
    private $throttlingData;

    /**
     * All CPU stats aggregated since container inception.
     */
    public function getCpuUsage(): ?ContainerCPUUsage
    {
        return $this->cpuUsage;
    }

    /**
     * All CPU stats aggregated since container inception.
     */
    public function setCpuUsage(?ContainerCPUUsage $cpuUsage): self
    {
        $this->initialized['cpuUsage'] = true;
        $this->cpuUsage = $cpuUsage;

        return $this;
    }

    /**
     * System Usage.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getSystemCpuUsage(): ?int
    {
        return $this->systemCpuUsage;
    }

    /**
     * System Usage.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setSystemCpuUsage(?int $systemCpuUsage): self
    {
        $this->initialized['systemCpuUsage'] = true;
        $this->systemCpuUsage = $systemCpuUsage;

        return $this;
    }

    /**
     * Number of online CPUs.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function getOnlineCpus(): ?int
    {
        return $this->onlineCpus;
    }

    /**
     * Number of online CPUs.
     *
     * This field is Linux-specific and omitted for Windows containers.
     */
    public function setOnlineCpus(?int $onlineCpus): self
    {
        $this->initialized['onlineCpus'] = true;
        $this->onlineCpus = $onlineCpus;

        return $this;
    }

    /**
     * CPU throttling stats of the container.
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function getThrottlingData(): ?ContainerThrottlingData
    {
        return $this->throttlingData;
    }

    /**
     * CPU throttling stats of the container.
     *
     * This type is Linux-specific and omitted for Windows containers.
     */
    public function setThrottlingData(?ContainerThrottlingData $throttlingData): self
    {
        $this->initialized['throttlingData'] = true;
        $this->throttlingData = $throttlingData;

        return $this;
    }
}
