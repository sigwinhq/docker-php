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

final class ConfigReference
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
     * The name of the config-only network that provides the network's
     * configuration. The specified network must be an existing config-only
     * network. Only network names are allowed, not network IDs.
     *
     * @var string
     */
    private $network;

    /**
     * The name of the config-only network that provides the network's
     * configuration. The specified network must be an existing config-only
     * network. Only network names are allowed, not network IDs.
     */
    public function getNetwork(): string
    {
        return $this->network;
    }

    /**
     * The name of the config-only network that provides the network's
     * configuration. The specified network must be an existing config-only
     * network. Only network names are allowed, not network IDs.
     */
    public function setNetwork(string $network): self
    {
        $this->initialized['network'] = true;
        $this->network = $network;

        return $this;
    }
}
