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

final class ServiceSpecModeReplicatedJob
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
     * The maximum number of replicas to run simultaneously.
     *
     * @var int
     */
    private $maxConcurrent = 1;
    /**
     * The total number of replicas desired to reach the Completed
     * state. If unset, will default to the value of `MaxConcurrent`.
     *
     * @var int
     */
    private $totalCompletions;

    /**
     * The maximum number of replicas to run simultaneously.
     */
    public function getMaxConcurrent(): int
    {
        return $this->maxConcurrent;
    }

    /**
     * The maximum number of replicas to run simultaneously.
     */
    public function setMaxConcurrent(int $maxConcurrent): self
    {
        $this->initialized['maxConcurrent'] = true;
        $this->maxConcurrent = $maxConcurrent;

        return $this;
    }

    /**
     * The total number of replicas desired to reach the Completed
     * state. If unset, will default to the value of `MaxConcurrent`.
     */
    public function getTotalCompletions(): int
    {
        return $this->totalCompletions;
    }

    /**
     * The total number of replicas desired to reach the Completed
     * state. If unset, will default to the value of `MaxConcurrent`.
     */
    public function setTotalCompletions(int $totalCompletions): self
    {
        $this->initialized['totalCompletions'] = true;
        $this->totalCompletions = $totalCompletions;

        return $this;
    }
}
