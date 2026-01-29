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

final class PluginConfigLinux
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
     * @var list<string>
     */
    private $capabilities;
    /**
     * @var bool
     */
    private $allowAllDevices;
    /**
     * @var list<PluginDevice>
     */
    private $devices;

    /**
     * @return list<string>
     */
    public function getCapabilities(): array
    {
        return $this->capabilities;
    }

    /**
     * @param list<string> $capabilities
     */
    public function setCapabilities(array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;

        return $this;
    }

    public function getAllowAllDevices(): bool
    {
        return $this->allowAllDevices;
    }

    public function setAllowAllDevices(bool $allowAllDevices): self
    {
        $this->initialized['allowAllDevices'] = true;
        $this->allowAllDevices = $allowAllDevices;

        return $this;
    }

    /**
     * @return list<PluginDevice>
     */
    public function getDevices(): array
    {
        return $this->devices;
    }

    /**
     * @param list<PluginDevice> $devices
     */
    public function setDevices(array $devices): self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;

        return $this;
    }
}
