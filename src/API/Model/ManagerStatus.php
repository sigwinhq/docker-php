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

final class ManagerStatus
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
     * @var bool
     */
    private $leader = false;
    /**
     * Reachability represents the reachability of a node.
     *
     * @var string
     */
    private $reachability;
    /**
     * The IP address and port at which the manager is reachable.
     *
     * @var string
     */
    private $addr;

    public function getLeader(): bool
    {
        return $this->leader;
    }

    public function setLeader(bool $leader): self
    {
        $this->initialized['leader'] = true;
        $this->leader = $leader;

        return $this;
    }

    /**
     * Reachability represents the reachability of a node.
     */
    public function getReachability(): string
    {
        return $this->reachability;
    }

    /**
     * Reachability represents the reachability of a node.
     */
    public function setReachability(string $reachability): self
    {
        $this->initialized['reachability'] = true;
        $this->reachability = $reachability;

        return $this;
    }

    /**
     * The IP address and port at which the manager is reachable.
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * The IP address and port at which the manager is reachable.
     */
    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
