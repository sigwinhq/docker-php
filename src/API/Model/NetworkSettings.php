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

final class NetworkSettings
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
     * SandboxID uniquely represents a container's network stack.
     *
     * @var string
     */
    private $sandboxID;
    /**
     * SandboxKey is the full path of the netns handle.
     *
     * @var string
     */
    private $sandboxKey;
    /**
     * PortMap describes the mapping of container ports to host ports, using the
     * container's port-number and protocol as key in the format `<port>/<protocol>`,
     * for example, `80/udp`.
     *
     * If a container's port is mapped for multiple protocols, separate entries
     * are added to the mapping table.
     *
     * @var array<string, list<PortBinding>>
     */
    private $ports;
    /**
     * Information about all networks that the container is connected to.
     *
     * @var array<string, EndpointSettings>
     */
    private $networks;

    /**
     * SandboxID uniquely represents a container's network stack.
     */
    public function getSandboxID(): string
    {
        return $this->sandboxID;
    }

    /**
     * SandboxID uniquely represents a container's network stack.
     */
    public function setSandboxID(string $sandboxID): self
    {
        $this->initialized['sandboxID'] = true;
        $this->sandboxID = $sandboxID;

        return $this;
    }

    /**
     * SandboxKey is the full path of the netns handle.
     */
    public function getSandboxKey(): string
    {
        return $this->sandboxKey;
    }

    /**
     * SandboxKey is the full path of the netns handle.
     */
    public function setSandboxKey(string $sandboxKey): self
    {
        $this->initialized['sandboxKey'] = true;
        $this->sandboxKey = $sandboxKey;

        return $this;
    }

    /**
     * PortMap describes the mapping of container ports to host ports, using the
     * container's port-number and protocol as key in the format `<port>/<protocol>`,
     * for example, `80/udp`.
     *
     * If a container's port is mapped for multiple protocols, separate entries
     * are added to the mapping table.
     *
     * @return array<string, list<PortBinding>>
     */
    public function getPorts(): iterable
    {
        return $this->ports;
    }

    /**
     * PortMap describes the mapping of container ports to host ports, using the
     * container's port-number and protocol as key in the format `<port>/<protocol>`,
     * for example, `80/udp`.
     *
     * If a container's port is mapped for multiple protocols, separate entries
     * are added to the mapping table.
     *
     * @param array<string, list<PortBinding>> $ports
     */
    public function setPorts(iterable $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }

    /**
     * Information about all networks that the container is connected to.
     *
     * @return array<string, EndpointSettings>
     */
    public function getNetworks(): iterable
    {
        return $this->networks;
    }

    /**
     * Information about all networks that the container is connected to.
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
