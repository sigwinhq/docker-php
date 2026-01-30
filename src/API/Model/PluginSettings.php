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

final class PluginSettings
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
     * @var list<PluginMount>
     */
    private $mounts;
    /**
     * @var list<string>
     */
    private $env;
    /**
     * @var list<string>
     */
    private $args;
    /**
     * @var list<PluginDevice>
     */
    private $devices;

    /**
     * @return list<PluginMount>
     */
    public function getMounts(): array
    {
        return $this->mounts;
    }

    /**
     * @param list<PluginMount> $mounts
     */
    public function setMounts(array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getEnv(): array
    {
        return $this->env;
    }

    /**
     * @param list<string> $env
     */
    public function setEnv(array $env): self
    {
        $this->initialized['env'] = true;
        $this->env = $env;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @param list<string> $args
     */
    public function setArgs(array $args): self
    {
        $this->initialized['args'] = true;
        $this->args = $args;

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
