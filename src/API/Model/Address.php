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

final class Address
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
     * IP address.
     *
     * @var string
     */
    private $addr;
    /**
     * Mask length of the IP address.
     *
     * @var int
     */
    private $prefixLen;

    /**
     * IP address.
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * IP address.
     */
    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }

    /**
     * Mask length of the IP address.
     */
    public function getPrefixLen(): int
    {
        return $this->prefixLen;
    }

    /**
     * Mask length of the IP address.
     */
    public function setPrefixLen(int $prefixLen): self
    {
        $this->initialized['prefixLen'] = true;
        $this->prefixLen = $prefixLen;

        return $this;
    }
}
