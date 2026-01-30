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

final class IPAM
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
     * Name of the IPAM driver to use.
     *
     * @var string
     */
    private $driver = 'default';
    /**
     * List of IPAM configuration options, specified as a map:
     *
     * ```
     * {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
     * ```
     *
     * @var list<IPAMConfig>
     */
    private $config;
    /**
     * Driver-specific options, specified as a map.
     *
     * @var array<string, string>
     */
    private $options;

    /**
     * Name of the IPAM driver to use.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Name of the IPAM driver to use.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * List of IPAM configuration options, specified as a map:
     *
     * ```
     * {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
     * ```
     *
     * @return list<IPAMConfig>
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * List of IPAM configuration options, specified as a map:
     *
     * ```
     * {"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}
     * ```
     *
     * @param list<IPAMConfig> $config
     */
    public function setConfig(array $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @param array<string, string> $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }
}
