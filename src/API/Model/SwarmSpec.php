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

final class SwarmSpec
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
     * Name of the swarm.
     *
     * @var string
     */
    private $name;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    private $labels;
    /**
     * Orchestration configuration.
     *
     * @var null|SwarmSpecOrchestration
     */
    private $orchestration;
    /**
     * Raft configuration.
     *
     * @var SwarmSpecRaft
     */
    private $raft;
    /**
     * Dispatcher configuration.
     *
     * @var null|SwarmSpecDispatcher
     */
    private $dispatcher;
    /**
     * CA configuration.
     *
     * @var null|SwarmSpecCAConfig
     */
    private $cAConfig;
    /**
     * Parameters related to encryption-at-rest.
     *
     * @var SwarmSpecEncryptionConfig
     */
    private $encryptionConfig;
    /**
     * Defaults for creating tasks in this cluster.
     *
     * @var SwarmSpecTaskDefaults
     */
    private $taskDefaults;

    /**
     * Name of the swarm.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the swarm.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * Orchestration configuration.
     */
    public function getOrchestration(): ?SwarmSpecOrchestration
    {
        return $this->orchestration;
    }

    /**
     * Orchestration configuration.
     */
    public function setOrchestration(?SwarmSpecOrchestration $orchestration): self
    {
        $this->initialized['orchestration'] = true;
        $this->orchestration = $orchestration;

        return $this;
    }

    /**
     * Raft configuration.
     */
    public function getRaft(): SwarmSpecRaft
    {
        return $this->raft;
    }

    /**
     * Raft configuration.
     */
    public function setRaft(SwarmSpecRaft $raft): self
    {
        $this->initialized['raft'] = true;
        $this->raft = $raft;

        return $this;
    }

    /**
     * Dispatcher configuration.
     */
    public function getDispatcher(): ?SwarmSpecDispatcher
    {
        return $this->dispatcher;
    }

    /**
     * Dispatcher configuration.
     */
    public function setDispatcher(?SwarmSpecDispatcher $dispatcher): self
    {
        $this->initialized['dispatcher'] = true;
        $this->dispatcher = $dispatcher;

        return $this;
    }

    /**
     * CA configuration.
     */
    public function getCAConfig(): ?SwarmSpecCAConfig
    {
        return $this->cAConfig;
    }

    /**
     * CA configuration.
     */
    public function setCAConfig(?SwarmSpecCAConfig $cAConfig): self
    {
        $this->initialized['cAConfig'] = true;
        $this->cAConfig = $cAConfig;

        return $this;
    }

    /**
     * Parameters related to encryption-at-rest.
     */
    public function getEncryptionConfig(): SwarmSpecEncryptionConfig
    {
        return $this->encryptionConfig;
    }

    /**
     * Parameters related to encryption-at-rest.
     */
    public function setEncryptionConfig(SwarmSpecEncryptionConfig $encryptionConfig): self
    {
        $this->initialized['encryptionConfig'] = true;
        $this->encryptionConfig = $encryptionConfig;

        return $this;
    }

    /**
     * Defaults for creating tasks in this cluster.
     */
    public function getTaskDefaults(): SwarmSpecTaskDefaults
    {
        return $this->taskDefaults;
    }

    /**
     * Defaults for creating tasks in this cluster.
     */
    public function setTaskDefaults(SwarmSpecTaskDefaults $taskDefaults): self
    {
        $this->initialized['taskDefaults'] = true;
        $this->taskDefaults = $taskDefaults;

        return $this;
    }
}
