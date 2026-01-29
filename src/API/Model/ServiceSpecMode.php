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

final class ServiceSpecMode
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
     * @var ServiceSpecModeReplicated
     */
    private $replicated;
    private $global;
    /**
     * The mode used for services with a finite number of tasks that run
     * to a completed state.
     *
     * @var ServiceSpecModeReplicatedJob
     */
    private $replicatedJob;
    /**
     * The mode used for services which run a task to the completed state
     * on each valid node.
     */
    private $globalJob;

    public function getReplicated(): ServiceSpecModeReplicated
    {
        return $this->replicated;
    }

    public function setReplicated(ServiceSpecModeReplicated $replicated): self
    {
        $this->initialized['replicated'] = true;
        $this->replicated = $replicated;

        return $this;
    }

    public function getGlobal(): mixed
    {
        return $this->global;
    }

    public function setGlobal($global): self
    {
        $this->initialized['global'] = true;
        $this->global = $global;

        return $this;
    }

    /**
     * The mode used for services with a finite number of tasks that run
     * to a completed state.
     */
    public function getReplicatedJob(): ServiceSpecModeReplicatedJob
    {
        return $this->replicatedJob;
    }

    /**
     * The mode used for services with a finite number of tasks that run
     * to a completed state.
     */
    public function setReplicatedJob(ServiceSpecModeReplicatedJob $replicatedJob): self
    {
        $this->initialized['replicatedJob'] = true;
        $this->replicatedJob = $replicatedJob;

        return $this;
    }

    /**
     * The mode used for services which run a task to the completed state
     * on each valid node.
     */
    public function getGlobalJob(): mixed
    {
        return $this->globalJob;
    }

    /**
     * The mode used for services which run a task to the completed state
     * on each valid node.
     */
    public function setGlobalJob($globalJob): self
    {
        $this->initialized['globalJob'] = true;
        $this->globalJob = $globalJob;

        return $this;
    }
}
