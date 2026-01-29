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

final class ThrottleDevice
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
     * Device path.
     *
     * @var string
     */
    private $path;
    /**
     * Rate.
     *
     * @var int
     */
    private $rate;

    /**
     * Device path.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Device path.
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;

        return $this;
    }

    /**
     * Rate.
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * Rate.
     */
    public function setRate(int $rate): self
    {
        $this->initialized['rate'] = true;
        $this->rate = $rate;

        return $this;
    }
}
