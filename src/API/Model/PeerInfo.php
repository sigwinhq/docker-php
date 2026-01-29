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

final class PeerInfo
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
     * ID of the peer-node in the Swarm cluster.
     *
     * @var string
     */
    private $name;
    /**
     * IP-address of the peer-node in the Swarm cluster.
     *
     * @var string
     */
    private $iP;

    /**
     * ID of the peer-node in the Swarm cluster.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * ID of the peer-node in the Swarm cluster.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * IP-address of the peer-node in the Swarm cluster.
     */
    public function getIP(): string
    {
        return $this->iP;
    }

    /**
     * IP-address of the peer-node in the Swarm cluster.
     */
    public function setIP(string $iP): self
    {
        $this->initialized['iP'] = true;
        $this->iP = $iP;

        return $this;
    }
}
