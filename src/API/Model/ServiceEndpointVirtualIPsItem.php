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

final class ServiceEndpointVirtualIPsItem
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
     * @var string
     */
    private $networkID;
    /**
     * @var string
     */
    private $addr;

    public function getNetworkID(): string
    {
        return $this->networkID;
    }

    public function setNetworkID(string $networkID): self
    {
        $this->initialized['networkID'] = true;
        $this->networkID = $networkID;

        return $this;
    }

    public function getAddr(): string
    {
        return $this->addr;
    }

    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
