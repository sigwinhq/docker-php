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

final class ContainerSummaryNetworkSettings
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
     * Summary of network-settings for each network the container is
     * attached to.
     *
     * @var array<string, EndpointSettings>
     */
    private $networks;

    /**
     * Summary of network-settings for each network the container is
     * attached to.
     *
     * @return array<string, EndpointSettings>
     */
    public function getNetworks(): iterable
    {
        return $this->networks;
    }

    /**
     * Summary of network-settings for each network the container is
     * attached to.
     *
     * @param array<string, EndpointSettings> $networks
     */
    public function setNetworks(iterable $networks): self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;

        return $this;
    }
}
