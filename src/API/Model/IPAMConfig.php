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

final class IPAMConfig
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
     * @var string
     */
    private $subnet;
    /**
     * @var string
     */
    private $iPRange;
    /**
     * @var string
     */
    private $gateway;
    /**
     * @var array<string, string>
     */
    private $auxiliaryAddresses;

    public function getSubnet(): string
    {
        return $this->subnet;
    }

    public function setSubnet(string $subnet): self
    {
        $this->initialized['subnet'] = true;
        $this->subnet = $subnet;

        return $this;
    }

    public function getIPRange(): string
    {
        return $this->iPRange;
    }

    public function setIPRange(string $iPRange): self
    {
        $this->initialized['iPRange'] = true;
        $this->iPRange = $iPRange;

        return $this;
    }

    public function getGateway(): string
    {
        return $this->gateway;
    }

    public function setGateway(string $gateway): self
    {
        $this->initialized['gateway'] = true;
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getAuxiliaryAddresses(): iterable
    {
        return $this->auxiliaryAddresses;
    }

    /**
     * @param array<string, string> $auxiliaryAddresses
     */
    public function setAuxiliaryAddresses(iterable $auxiliaryAddresses): self
    {
        $this->initialized['auxiliaryAddresses'] = true;
        $this->auxiliaryAddresses = $auxiliaryAddresses;

        return $this;
    }
}
