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

final class NetworkAttachmentConfig
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
     * The target network for attachment. Must be a network name or ID.
     *
     * @var string
     */
    private $target;
    /**
     * Discoverable alternate names for the service on this network.
     *
     * @var list<string>
     */
    private $aliases;
    /**
     * Driver attachment options for the network target.
     *
     * @var array<string, string>
     */
    private $driverOpts;

    /**
     * The target network for attachment. Must be a network name or ID.
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * The target network for attachment. Must be a network name or ID.
     */
    public function setTarget(string $target): self
    {
        $this->initialized['target'] = true;
        $this->target = $target;

        return $this;
    }

    /**
     * Discoverable alternate names for the service on this network.
     *
     * @return list<string>
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    /**
     * Discoverable alternate names for the service on this network.
     *
     * @param list<string> $aliases
     */
    public function setAliases(array $aliases): self
    {
        $this->initialized['aliases'] = true;
        $this->aliases = $aliases;

        return $this;
    }

    /**
     * Driver attachment options for the network target.
     *
     * @return array<string, string>
     */
    public function getDriverOpts(): iterable
    {
        return $this->driverOpts;
    }

    /**
     * Driver attachment options for the network target.
     *
     * @param array<string, string> $driverOpts
     */
    public function setDriverOpts(iterable $driverOpts): self
    {
        $this->initialized['driverOpts'] = true;
        $this->driverOpts = $driverOpts;

        return $this;
    }
}
