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

final class SubnetStatus
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
     * Number of IP addresses in the subnet that are in use or reserved and are therefore unavailable for allocation, saturating at 2<sup>64</sup> - 1.
     *
     * @var int
     */
    private $iPsInUse;
    /**
     * Number of IP addresses within the network's IPRange for the subnet that are available for allocation, saturating at 2<sup>64</sup> - 1.
     *
     * @var int
     */
    private $dynamicIPsAvailable;

    /**
     * Number of IP addresses in the subnet that are in use or reserved and are therefore unavailable for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function getIPsInUse(): int
    {
        return $this->iPsInUse;
    }

    /**
     * Number of IP addresses in the subnet that are in use or reserved and are therefore unavailable for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function setIPsInUse(int $iPsInUse): self
    {
        $this->initialized['iPsInUse'] = true;
        $this->iPsInUse = $iPsInUse;

        return $this;
    }

    /**
     * Number of IP addresses within the network's IPRange for the subnet that are available for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function getDynamicIPsAvailable(): int
    {
        return $this->dynamicIPsAvailable;
    }

    /**
     * Number of IP addresses within the network's IPRange for the subnet that are available for allocation, saturating at 2<sup>64</sup> - 1.
     */
    public function setDynamicIPsAvailable(int $dynamicIPsAvailable): self
    {
        $this->initialized['dynamicIPsAvailable'] = true;
        $this->dynamicIPsAvailable = $dynamicIPsAvailable;

        return $this;
    }
}
