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

final class ContainerPidsStats
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
     * Current is the number of PIDs in the cgroup.
     *
     * @var null|int
     */
    private $current;
    /**
     * Limit is the hard limit on the number of pids in the cgroup.
     * A "Limit" of 0 means that there is no limit.
     *
     * @var null|int
     */
    private $limit;

    /**
     * Current is the number of PIDs in the cgroup.
     */
    public function getCurrent(): ?int
    {
        return $this->current;
    }

    /**
     * Current is the number of PIDs in the cgroup.
     */
    public function setCurrent(?int $current): self
    {
        $this->initialized['current'] = true;
        $this->current = $current;

        return $this;
    }

    /**
     * Limit is the hard limit on the number of pids in the cgroup.
     * A "Limit" of 0 means that there is no limit.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Limit is the hard limit on the number of pids in the cgroup.
     * A "Limit" of 0 means that there is no limit.
     */
    public function setLimit(?int $limit): self
    {
        $this->initialized['limit'] = true;
        $this->limit = $limit;

        return $this;
    }
}
