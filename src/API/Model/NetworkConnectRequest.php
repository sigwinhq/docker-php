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

final class NetworkConnectRequest
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
     * The ID or name of the container to connect to the network.
     *
     * @var string
     */
    private $container;
    /**
     * Configuration for a network endpoint.
     *
     * @var EndpointSettings
     */
    private $endpointConfig;

    /**
     * The ID or name of the container to connect to the network.
     */
    public function getContainer(): string
    {
        return $this->container;
    }

    /**
     * The ID or name of the container to connect to the network.
     */
    public function setContainer(string $container): self
    {
        $this->initialized['container'] = true;
        $this->container = $container;

        return $this;
    }

    /**
     * Configuration for a network endpoint.
     */
    public function getEndpointConfig(): EndpointSettings
    {
        return $this->endpointConfig;
    }

    /**
     * Configuration for a network endpoint.
     */
    public function setEndpointConfig(EndpointSettings $endpointConfig): self
    {
        $this->initialized['endpointConfig'] = true;
        $this->endpointConfig = $endpointConfig;

        return $this;
    }
}
