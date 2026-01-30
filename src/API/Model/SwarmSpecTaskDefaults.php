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

final class SwarmSpecTaskDefaults
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
     * The log driver to use for tasks created in the orchestrator if
     * unspecified by a service.
     *
     * Updating this value only affects new tasks. Existing tasks continue
     * to use their previously configured log driver until recreated.
     *
     * @var SwarmSpecTaskDefaultsLogDriver
     */
    private $logDriver;

    /**
     * The log driver to use for tasks created in the orchestrator if
     * unspecified by a service.
     *
     * Updating this value only affects new tasks. Existing tasks continue
     * to use their previously configured log driver until recreated.
     */
    public function getLogDriver(): SwarmSpecTaskDefaultsLogDriver
    {
        return $this->logDriver;
    }

    /**
     * The log driver to use for tasks created in the orchestrator if
     * unspecified by a service.
     *
     * Updating this value only affects new tasks. Existing tasks continue
     * to use their previously configured log driver until recreated.
     */
    public function setLogDriver(SwarmSpecTaskDefaultsLogDriver $logDriver): self
    {
        $this->initialized['logDriver'] = true;
        $this->logDriver = $logDriver;

        return $this;
    }
}
