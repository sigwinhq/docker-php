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

final class DeviceInfo
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
     * The origin device driver.
     *
     * @var string
     */
    private $source;
    /**
     * The unique identifier for the device within its source driver.
     * For CDI devices, this would be an FQDN like "vendor.com/gpu=0".
     *
     * @var string
     */
    private $iD;

    /**
     * The origin device driver.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * The origin device driver.
     */
    public function setSource(string $source): self
    {
        $this->initialized['source'] = true;
        $this->source = $source;

        return $this;
    }

    /**
     * The unique identifier for the device within its source driver.
     * For CDI devices, this would be an FQDN like "vendor.com/gpu=0".
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The unique identifier for the device within its source driver.
     * For CDI devices, this would be an FQDN like "vendor.com/gpu=0".
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }
}
