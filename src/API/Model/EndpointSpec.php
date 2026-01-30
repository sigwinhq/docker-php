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

final class EndpointSpec
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
     * The mode of resolution to use for internal load balancing between tasks.
     *
     * @var string
     */
    private $mode = 'vip';
    /**
     * List of exposed ports that this service is accessible on from the
     * outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @var list<EndpointPortConfig>
     */
    private $ports;

    /**
     * The mode of resolution to use for internal load balancing between tasks.
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * The mode of resolution to use for internal load balancing between tasks.
     */
    public function setMode(string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;

        return $this;
    }

    /**
     * List of exposed ports that this service is accessible on from the
     * outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @return list<EndpointPortConfig>
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * List of exposed ports that this service is accessible on from the
     * outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @param list<EndpointPortConfig> $ports
     */
    public function setPorts(array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }
}
