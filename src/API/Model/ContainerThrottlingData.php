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

final class ContainerThrottlingData
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
     * Number of periods with throttling active.
     *
     * @var int
     */
    private $periods;
    /**
     * Number of periods when the container hit its throttling limit.
     *
     * @var int
     */
    private $throttledPeriods;
    /**
     * Aggregated time (in nanoseconds) the container was throttled for.
     *
     * @var int
     */
    private $throttledTime;

    /**
     * Number of periods with throttling active.
     */
    public function getPeriods(): int
    {
        return $this->periods;
    }

    /**
     * Number of periods with throttling active.
     */
    public function setPeriods(int $periods): self
    {
        $this->initialized['periods'] = true;
        $this->periods = $periods;

        return $this;
    }

    /**
     * Number of periods when the container hit its throttling limit.
     */
    public function getThrottledPeriods(): int
    {
        return $this->throttledPeriods;
    }

    /**
     * Number of periods when the container hit its throttling limit.
     */
    public function setThrottledPeriods(int $throttledPeriods): self
    {
        $this->initialized['throttledPeriods'] = true;
        $this->throttledPeriods = $throttledPeriods;

        return $this;
    }

    /**
     * Aggregated time (in nanoseconds) the container was throttled for.
     */
    public function getThrottledTime(): int
    {
        return $this->throttledTime;
    }

    /**
     * Aggregated time (in nanoseconds) the container was throttled for.
     */
    public function setThrottledTime(int $throttledTime): self
    {
        $this->initialized['throttledTime'] = true;
        $this->throttledTime = $throttledTime;

        return $this;
    }
}
