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

final class DeviceRequest
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
     * The name of the device driver to use for this request.
     *
     * Note that if this is specified the capabilities are ignored when
     * selecting a device driver.
     *
     * @var string
     */
    private $driver;
    /**
     * @var int
     */
    private $count;
    /**
     * @var list<string>
     */
    private $deviceIDs;
    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * Note that if a driver is specified the capabilities have no effect on
     * selecting a driver as the driver name is used directly.
     *
     * Note that if no driver is specified the capabilities are used to
     * select a driver with the required capabilities.
     *
     * @var list<list<string>>
     */
    private $capabilities;
    /**
     * Driver-specific options, specified as a key/value pairs. These options
     * are passed directly to the driver.
     *
     * @var array<string, string>
     */
    private $options;

    /**
     * The name of the device driver to use for this request.
     *
     * Note that if this is specified the capabilities are ignored when
     * selecting a device driver.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * The name of the device driver to use for this request.
     *
     * Note that if this is specified the capabilities are ignored when
     * selecting a device driver.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->initialized['count'] = true;
        $this->count = $count;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getDeviceIDs(): array
    {
        return $this->deviceIDs;
    }

    /**
     * @param list<string> $deviceIDs
     */
    public function setDeviceIDs(array $deviceIDs): self
    {
        $this->initialized['deviceIDs'] = true;
        $this->deviceIDs = $deviceIDs;

        return $this;
    }

    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * Note that if a driver is specified the capabilities have no effect on
     * selecting a driver as the driver name is used directly.
     *
     * Note that if no driver is specified the capabilities are used to
     * select a driver with the required capabilities.
     *
     * @return list<list<string>>
     */
    public function getCapabilities(): array
    {
        return $this->capabilities;
    }

    /**
     * A list of capabilities; an OR list of AND lists of capabilities.
     *
     * Note that if a driver is specified the capabilities have no effect on
     * selecting a driver as the driver name is used directly.
     *
     * Note that if no driver is specified the capabilities are used to
     * select a driver with the required capabilities.
     *
     * @param list<list<string>> $capabilities
     */
    public function setCapabilities(array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;

        return $this;
    }

    /**
     * Driver-specific options, specified as a key/value pairs. These options
     * are passed directly to the driver.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * Driver-specific options, specified as a key/value pairs. These options
     * are passed directly to the driver.
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
