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

final class EndpointIPAMConfig
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
    private $iPv4Address;
    /**
     * @var string
     */
    private $iPv6Address;
    /**
     * @var list<string>
     */
    private $linkLocalIPs;

    public function getIPv4Address(): string
    {
        return $this->iPv4Address;
    }

    public function setIPv4Address(string $iPv4Address): self
    {
        $this->initialized['iPv4Address'] = true;
        $this->iPv4Address = $iPv4Address;

        return $this;
    }

    public function getIPv6Address(): string
    {
        return $this->iPv6Address;
    }

    public function setIPv6Address(string $iPv6Address): self
    {
        $this->initialized['iPv6Address'] = true;
        $this->iPv6Address = $iPv6Address;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getLinkLocalIPs(): array
    {
        return $this->linkLocalIPs;
    }

    /**
     * @param list<string> $linkLocalIPs
     */
    public function setLinkLocalIPs(array $linkLocalIPs): self
    {
        $this->initialized['linkLocalIPs'] = true;
        $this->linkLocalIPs = $linkLocalIPs;

        return $this;
    }
}
