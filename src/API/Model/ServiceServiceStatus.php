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

final class ServiceServiceStatus
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
     * The number of tasks for the service currently in the Running state.
     *
     * @var int
     */
    private $runningTasks;
    /**
     * The number of tasks for the service desired to be running.
     * For replicated services, this is the replica count from the
     * service spec. For global services, this is computed by taking
     * count of all tasks for the service with a Desired State other
     * than Shutdown.
     *
     * @var int
     */
    private $desiredTasks;
    /**
     * The number of tasks for a job that are in the Completed state.
     * This field must be cross-referenced with the service type, as the
     * value of 0 may mean the service is not in a job mode, or it may
     * mean the job-mode service has no tasks yet Completed.
     *
     * @var int
     */
    private $completedTasks;

    /**
     * The number of tasks for the service currently in the Running state.
     */
    public function getRunningTasks(): int
    {
        return $this->runningTasks;
    }

    /**
     * The number of tasks for the service currently in the Running state.
     */
    public function setRunningTasks(int $runningTasks): self
    {
        $this->initialized['runningTasks'] = true;
        $this->runningTasks = $runningTasks;

        return $this;
    }

    /**
     * The number of tasks for the service desired to be running.
     * For replicated services, this is the replica count from the
     * service spec. For global services, this is computed by taking
     * count of all tasks for the service with a Desired State other
     * than Shutdown.
     */
    public function getDesiredTasks(): int
    {
        return $this->desiredTasks;
    }

    /**
     * The number of tasks for the service desired to be running.
     * For replicated services, this is the replica count from the
     * service spec. For global services, this is computed by taking
     * count of all tasks for the service with a Desired State other
     * than Shutdown.
     */
    public function setDesiredTasks(int $desiredTasks): self
    {
        $this->initialized['desiredTasks'] = true;
        $this->desiredTasks = $desiredTasks;

        return $this;
    }

    /**
     * The number of tasks for a job that are in the Completed state.
     * This field must be cross-referenced with the service type, as the
     * value of 0 may mean the service is not in a job mode, or it may
     * mean the job-mode service has no tasks yet Completed.
     */
    public function getCompletedTasks(): int
    {
        return $this->completedTasks;
    }

    /**
     * The number of tasks for a job that are in the Completed state.
     * This field must be cross-referenced with the service type, as the
     * value of 0 may mean the service is not in a job mode, or it may
     * mean the job-mode service has no tasks yet Completed.
     */
    public function setCompletedTasks(int $completedTasks): self
    {
        $this->initialized['completedTasks'] = true;
        $this->completedTasks = $completedTasks;

        return $this;
    }
}
