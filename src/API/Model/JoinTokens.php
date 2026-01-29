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

final class JoinTokens
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
     * The token workers can use to join the swarm.
     *
     * @var string
     */
    private $worker;
    /**
     * The token managers can use to join the swarm.
     *
     * @var string
     */
    private $manager;

    /**
     * The token workers can use to join the swarm.
     */
    public function getWorker(): string
    {
        return $this->worker;
    }

    /**
     * The token workers can use to join the swarm.
     */
    public function setWorker(string $worker): self
    {
        $this->initialized['worker'] = true;
        $this->worker = $worker;

        return $this;
    }

    /**
     * The token managers can use to join the swarm.
     */
    public function getManager(): string
    {
        return $this->manager;
    }

    /**
     * The token managers can use to join the swarm.
     */
    public function setManager(string $manager): self
    {
        $this->initialized['manager'] = true;
        $this->manager = $manager;

        return $this;
    }
}
