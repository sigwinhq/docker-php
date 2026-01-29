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

final class TaskSpecContainerSpecUlimitsItem
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
     * Name of ulimit.
     *
     * @var string
     */
    private $name;
    /**
     * Soft limit.
     *
     * @var int
     */
    private $soft;
    /**
     * Hard limit.
     *
     * @var int
     */
    private $hard;

    /**
     * Name of ulimit.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of ulimit.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Soft limit.
     */
    public function getSoft(): int
    {
        return $this->soft;
    }

    /**
     * Soft limit.
     */
    public function setSoft(int $soft): self
    {
        $this->initialized['soft'] = true;
        $this->soft = $soft;

        return $this;
    }

    /**
     * Hard limit.
     */
    public function getHard(): int
    {
        return $this->hard;
    }

    /**
     * Hard limit.
     */
    public function setHard(int $hard): self
    {
        $this->initialized['hard'] = true;
        $this->hard = $hard;

        return $this;
    }
}
