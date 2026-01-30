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

final class ServiceEndpoint
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
     * Properties that can be configured to access and load balance a service.
     *
     * @var EndpointSpec
     */
    private $spec;
    /**
     * @var list<EndpointPortConfig>
     */
    private $ports;
    /**
     * @var list<ServiceEndpointVirtualIPsItem>
     */
    private $virtualIPs;

    /**
     * Properties that can be configured to access and load balance a service.
     */
    public function getSpec(): EndpointSpec
    {
        return $this->spec;
    }

    /**
     * Properties that can be configured to access and load balance a service.
     */
    public function setSpec(EndpointSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;

        return $this;
    }

    /**
     * @return list<EndpointPortConfig>
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * @param list<EndpointPortConfig> $ports
     */
    public function setPorts(array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }

    /**
     * @return list<ServiceEndpointVirtualIPsItem>
     */
    public function getVirtualIPs(): array
    {
        return $this->virtualIPs;
    }

    /**
     * @param list<ServiceEndpointVirtualIPsItem> $virtualIPs
     */
    public function setVirtualIPs(array $virtualIPs): self
    {
        $this->initialized['virtualIPs'] = true;
        $this->virtualIPs = $virtualIPs;

        return $this;
    }
}
