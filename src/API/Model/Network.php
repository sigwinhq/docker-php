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

final class Network
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
     * Name of the network.
     *
     * @var string
     */
    private $name;
    /**
     * ID that uniquely identifies a network on a single machine.
     *
     * @var string
     */
    private $id;
    /**
     * Date and time at which the network was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string
     */
    private $created;
    /**
     * The level at which the network exists (e.g. `swarm` for cluster-wide
     * or `local` for machine level).
     *
     * @var string
     */
    private $scope;
    /**
     * The name of the driver used to create the network (e.g. `bridge`,
     * `overlay`).
     *
     * @var string
     */
    private $driver;
    /**
     * Whether the network was created with IPv4 enabled.
     *
     * @var bool
     */
    private $enableIPv4;
    /**
     * Whether the network was created with IPv6 enabled.
     *
     * @var bool
     */
    private $enableIPv6;
    /**
     * @var IPAM
     */
    private $iPAM;
    /**
     * Whether the network is created to only allow internal networking
     * connectivity.
     *
     * @var bool
     */
    private $internal = false;
    /**
     * Whether a global / swarm scope network is manually attachable by regular
     * containers from workers in swarm mode.
     *
     * @var bool
     */
    private $attachable = false;
    /**
     * Whether the network is providing the routing-mesh for the swarm cluster.
     *
     * @var bool
     */
    private $ingress = false;
    /**
     * The config-only network source to provide the configuration for
     * this network.
     *
     * @var ConfigReference
     */
    private $configFrom;
    /**
     * Whether the network is a config-only network. Config-only networks are
     * placeholder networks for network configurations to be used by other
     * networks. Config-only networks cannot be used directly to run containers
     * or services.
     *
     * @var bool
     */
    private $configOnly = false;
    /**
     * Network-specific options uses when creating the network.
     *
     * @var array<string, string>
     */
    private $options;
    /**
     * Metadata specific to the network being created.
     *
     * @var array<string, string>
     */
    private $labels;
    /**
     * List of peer nodes for an overlay network. This field is only present
     * for overlay networks, and omitted for other network types.
     *
     * @var list<PeerInfo>
     */
    private $peers;

    /**
     * Name of the network.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the network.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * ID that uniquely identifies a network on a single machine.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * ID that uniquely identifies a network on a single machine.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Date and time at which the network was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * Date and time at which the network was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setCreated(string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

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
     * The name of the driver used to create the network (e.g. `bridge`,
     * `overlay`).
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * The name of the driver used to create the network (e.g. `bridge`,
     * `overlay`).
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * Whether the network was created with IPv4 enabled.
     */
    public function getEnableIPv4(): bool
    {
        return $this->enableIPv4;
    }

    /**
     * Whether the network was created with IPv4 enabled.
     */
    public function setEnableIPv4(bool $enableIPv4): self
    {
        $this->initialized['enableIPv4'] = true;
        $this->enableIPv4 = $enableIPv4;

        return $this;
    }

    /**
     * Whether the network was created with IPv6 enabled.
     */
    public function getEnableIPv6(): bool
    {
        return $this->enableIPv6;
    }

    /**
     * Whether the network was created with IPv6 enabled.
     */
    public function setEnableIPv6(bool $enableIPv6): self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;

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
     * Whether the network is created to only allow internal networking
     * connectivity.
     */
    public function getInternal(): bool
    {
        return $this->internal;
    }

    /**
     * Whether the network is created to only allow internal networking
     * connectivity.
     */
    public function setInternal(bool $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;

        return $this;
    }

    /**
     * Whether a global / swarm scope network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function getAttachable(): bool
    {
        return $this->attachable;
    }

    /**
     * Whether a global / swarm scope network is manually attachable by regular
     * containers from workers in swarm mode.
     */
    public function setAttachable(bool $attachable): self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;

        return $this;
    }

    /**
     * Whether the network is providing the routing-mesh for the swarm cluster.
     */
    public function getIngress(): bool
    {
        return $this->ingress;
    }

    /**
     * Whether the network is providing the routing-mesh for the swarm cluster.
     */
    public function setIngress(bool $ingress): self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;

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

    /**
     * Whether the network is a config-only network. Config-only networks are
     * placeholder networks for network configurations to be used by other
     * networks. Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function getConfigOnly(): bool
    {
        return $this->configOnly;
    }

    /**
     * Whether the network is a config-only network. Config-only networks are
     * placeholder networks for network configurations to be used by other
     * networks. Config-only networks cannot be used directly to run containers
     * or services.
     */
    public function setConfigOnly(bool $configOnly): self
    {
        $this->initialized['configOnly'] = true;
        $this->configOnly = $configOnly;

        return $this;
    }

    /**
     * Network-specific options uses when creating the network.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * Network-specific options uses when creating the network.
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
     * Metadata specific to the network being created.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * Metadata specific to the network being created.
     *
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * List of peer nodes for an overlay network. This field is only present
     * for overlay networks, and omitted for other network types.
     *
     * @return list<PeerInfo>
     */
    public function getPeers(): array
    {
        return $this->peers;
    }

    /**
     * List of peer nodes for an overlay network. This field is only present
     * for overlay networks, and omitted for other network types.
     *
     * @param list<PeerInfo> $peers
     */
    public function setPeers(array $peers): self
    {
        $this->initialized['peers'] = true;
        $this->peers = $peers;

        return $this;
    }
}
