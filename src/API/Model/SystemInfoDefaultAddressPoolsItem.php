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

final class SystemInfoDefaultAddressPoolsItem
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
     * The network address in CIDR format.
     *
     * @var string
     */
    private $base;
    /**
     * The network pool size.
     *
     * @var int
     */
    private $size;

    /**
     * The network address in CIDR format.
     */
    public function getBase(): string
    {
        return $this->base;
    }

    /**
     * The network address in CIDR format.
     */
    public function setBase(string $base): self
    {
        $this->initialized['base'] = true;
        $this->base = $base;

        return $this;
    }

    /**
     * The network pool size.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * The network pool size.
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }
}
