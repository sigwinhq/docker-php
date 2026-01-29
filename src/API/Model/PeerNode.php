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

final class PeerNode
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
     * Unique identifier of for this node in the swarm.
     *
     * @var string
     */
    private $nodeID;
    /**
     * IP address and ports at which this node can be reached.
     *
     * @var string
     */
    private $addr;

    /**
     * Unique identifier of for this node in the swarm.
     */
    public function getNodeID(): string
    {
        return $this->nodeID;
    }

    /**
     * Unique identifier of for this node in the swarm.
     */
    public function setNodeID(string $nodeID): self
    {
        $this->initialized['nodeID'] = true;
        $this->nodeID = $nodeID;

        return $this;
    }

    /**
     * IP address and ports at which this node can be reached.
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * IP address and ports at which this node can be reached.
     */
    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
