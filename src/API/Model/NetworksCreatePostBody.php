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

final class NetworksCreatePostBody
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
     * The network's name.
     *
     * @var string
     */
    private $name;
    /**
     * Name of the network driver plugin to use.
     *
     * @var string
     */
    private $driver = 'bridge';
    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     *
     * @var string
     */
    private $scope;
    /**
     * Restrict external access to the network.
     *
     * @var bool
     */
    private $internal;
    /**
     * Globally scoped network is manually attachable by regular
     * containers from workers in swarm mode.
     *
     * @var bool
     */
    private $attachable;
    /**
     * Ingress network is the network which provides the routing-mesh
     * in swarm mode.
     *
     * @var bool
     */
    private $ingress;
    /**
     * Creates a config-only network. Config-only networks are placeholder
     * networks for network configurations to be used by other networks.
     * Config-only networks cannot be used directly to run containers
     * or services.
     *
     * @var bool
     */
    private $configOnly = false;
    /**
     * The config-only network source to provide the configuration for
     * this network.
     *
     * @var ConfigReference
     */
    private $configFrom;
    /**
     * @var IPAM
     */
    private $iPAM;
    /**
     * Enable IPv4 on the network.
     *
     * @var bool
     */
    private $enableIPv4;
    /**
     * Enable IPv6 on the network.
     *
     * @var bool
     */
    private $enableIPv6;
    /**
     * Network specific options to be used by the drivers.
     *
     * @var array<string, string>
     */
    private $options;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    private $labels;

    /**
     * The network's name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The network's name.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Name of the network driver plugin to use.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Name of the network driver plugin to use.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     */
    public function setScope(string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * Restrict external access to the network.
     */
    public function getInternal(): bool
    {
        return $this->internal;
    }

    /**
     * Restrict external access to the network.
     */
    public function setInternal(bool $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;

        return $this;
    }

    /**
     * Globally scoped network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function getAttachable(): bool
    {
        return $this->attachable;
    }

    /**
     * Globally scoped network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function setAttachable(bool $attachable): self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;

        return $this;
    }

    /**
     * Ingress network is the network which provides the routing-mesh
     * in swarm mode.
     */
    public function getIngress(): bool
    {
        return $this->ingress;
    }

    /**
     * Ingress network is the network which provides the routing-mesh
     * in swarm mode.
     */
    public function setIngress(bool $ingress): self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;

        return $this;
    }

    /**
     * Creates a config-only network. Config-only networks are placeholder
     * networks for network configurations to be used by other networks.
     * Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function getConfigOnly(): bool
    {
        return $this->configOnly;
    }

    /**
     * Creates a config-only network. Config-only networks are placeholder
     * networks for network configurations to be used by other networks.
     * Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function setConfigOnly(bool $configOnly): self
    {
        $this->initialized['configOnly'] = true;
        $this->configOnly = $configOnly;

        return $this;
    }

    /**
     * The config-only network source to provide the configuration for
     * this network.
     */
    public function getConfigFrom(): ConfigReference
    {
        return $this->configFrom;
    }

    /**
     * The config-only network source to provide the configuration for
     * this network.
     */
    public function setConfigFrom(ConfigReference $configFrom): self
    {
        $this->initialized['configFrom'] = true;
        $this->configFrom = $configFrom;

        return $this;
    }

    public function getIPAM(): IPAM
    {
        return $this->iPAM;
    }

    public function setIPAM(IPAM $iPAM): self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;

        return $this;
    }

    /**
     * Enable IPv4 on the network.
     */
    public function getEnableIPv4(): bool
    {
        return $this->enableIPv4;
    }

    /**
     * Enable IPv4 on the network.
     */
    public function setEnableIPv4(bool $enableIPv4): self
    {
        $this->initialized['enableIPv4'] = true;
        $this->enableIPv4 = $enableIPv4;

        return $this;
    }

    /**
     * Enable IPv6 on the network.
     */
    public function getEnableIPv6(): bool
    {
        return $this->enableIPv6;
    }

    /**
     * Enable IPv6 on the network.
     */
    public function setEnableIPv6(bool $enableIPv6): self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;

        return $this;
    }

    /**
     * Network specific options to be used by the drivers.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * Network specific options to be used by the drivers.
     *
     * @param array<string, string> $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }
}
