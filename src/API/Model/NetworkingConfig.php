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

final class NetworkingConfig
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
     * A mapping of network name to endpoint configuration for that network.
     * The endpoint configuration can be left empty to connect to that
     * network with no particular endpoint configuration.
     *
     * @var array<string, EndpointSettings>
     */
    private $endpointsConfig;

    /**
     * A mapping of network name to endpoint configuration for that network.
     * The endpoint configuration can be left empty to connect to that
     * network with no particular endpoint configuration.
     *
     * @return array<string, EndpointSettings>
     */
    public function getEndpointsConfig(): iterable
    {
        return $this->endpointsConfig;
    }

    /**
     * A mapping of network name to endpoint configuration for that network.
     * The endpoint configuration can be left empty to connect to that
     * network with no particular endpoint configuration.
     *
     * @param array<string, EndpointSettings> $endpointsConfig
     */
    public function setEndpointsConfig(iterable $endpointsConfig): self
    {
        $this->initialized['endpointsConfig'] = true;
        $this->endpointsConfig = $endpointsConfig;

        return $this;
    }
}
