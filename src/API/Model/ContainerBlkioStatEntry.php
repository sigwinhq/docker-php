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

final class ContainerBlkioStatEntry
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
     * @var int
     */
    private $major;
    /**
     * @var int
     */
    private $minor;
    /**
     * @var string
     */
    private $op;
    /**
     * @var int
     */
    private $value;

    public function getMajor(): int
    {
        return $this->major;
    }

    public function setMajor(int $major): self
    {
        $this->initialized['major'] = true;
        $this->major = $major;

        return $this;
    }

    public function getMinor(): int
    {
        return $this->minor;
    }

    public function setMinor(int $minor): self
    {
        $this->initialized['minor'] = true;
        $this->minor = $minor;

        return $this;
    }

    public function getOp(): string
    {
        return $this->op;
    }

    public function setOp(string $op): self
    {
        $this->initialized['op'] = true;
        $this->op = $op;

        return $this;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }
}
