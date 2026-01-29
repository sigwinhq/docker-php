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

final class ContainerSummaryHealth
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
     * the health status of the container.
     *
     * @var string
     */
    private $status;
    /**
     * FailingStreak is the number of consecutive failures.
     *
     * @var int
     */
    private $failingStreak;

    /**
     * the health status of the container.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * the health status of the container.
     */
    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * FailingStreak is the number of consecutive failures.
     */
    public function getFailingStreak(): int
    {
        return $this->failingStreak;
    }

    /**
     * FailingStreak is the number of consecutive failures.
     */
    public function setFailingStreak(int $failingStreak): self
    {
        $this->initialized['failingStreak'] = true;
        $this->failingStreak = $failingStreak;

        return $this;
    }
}
