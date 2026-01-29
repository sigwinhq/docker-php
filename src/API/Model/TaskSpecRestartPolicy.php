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

final class TaskSpecRestartPolicy
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
     * Condition for restart.
     *
     * @var string
     */
    private $condition;
    /**
     * Delay between restart attempts.
     *
     * @var int
     */
    private $delay;
    /**
     * Maximum attempts to restart a given container before giving up
     * (default value is 0, which is ignored).
     *
     * @var int
     */
    private $maxAttempts = 0;
    /**
     * Windows is the time window used to evaluate the restart policy
     * (default value is 0, which is unbounded).
     *
     * @var int
     */
    private $window = 0;

    /**
     * Condition for restart.
     */
    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * Condition for restart.
     */
    public function setCondition(string $condition): self
    {
        $this->initialized['condition'] = true;
        $this->condition = $condition;

        return $this;
    }

    /**
     * Delay between restart attempts.
     */
    public function getDelay(): int
    {
        return $this->delay;
    }

    /**
     * Delay between restart attempts.
     */
    public function setDelay(int $delay): self
    {
        $this->initialized['delay'] = true;
        $this->delay = $delay;

        return $this;
    }

    /**
     * Maximum attempts to restart a given container before giving up
     * (default value is 0, which is ignored).
     */
    public function getMaxAttempts(): int
    {
        return $this->maxAttempts;
    }

    /**
     * Maximum attempts to restart a given container before giving up
     * (default value is 0, which is ignored).
     */
    public function setMaxAttempts(int $maxAttempts): self
    {
        $this->initialized['maxAttempts'] = true;
        $this->maxAttempts = $maxAttempts;

        return $this;
    }

    /**
     * Windows is the time window used to evaluate the restart policy
     * (default value is 0, which is unbounded).
     */
    public function getWindow(): int
    {
        return $this->window;
    }

    /**
     * Windows is the time window used to evaluate the restart policy
     * (default value is 0, which is unbounded).
     */
    public function setWindow(int $window): self
    {
        $this->initialized['window'] = true;
        $this->window = $window;

        return $this;
    }
}
