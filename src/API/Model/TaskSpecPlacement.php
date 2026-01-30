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

final class TaskSpecPlacement
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
     * An array of constraint expressions to limit the set of nodes where
     * a task can be scheduled. Constraint expressions can either use a
     * _match_ (`==`) or _exclude_ (`!=`) rule. Multiple constraints find
     * nodes that satisfy every expression (AND match). Constraints can
     * match node or Docker Engine labels as follows:
     *
     * node attribute       | matches                        | example
     * ---------------------|--------------------------------|-----------------------------------------------
     * `node.id`            | Node ID                        | `node.id==2ivku8v2gvtg4`
     * `node.hostname`      | Node hostname                  | `node.hostname!=node-2`
     * `node.role`          | Node role (`manager`/`worker`) | `node.role==manager`
     * `node.platform.os`   | Node operating system          | `node.platform.os==windows`
     * `node.platform.arch` | Node architecture              | `node.platform.arch==x86_64`
     * `node.labels`        | User-defined node labels       | `node.labels.security==high`
     * `engine.labels`      | Docker Engine's labels         | `engine.labels.operatingsystem==ubuntu-24.04`
     *
     * `engine.labels` apply to Docker Engine labels like operating system,
     * drivers, etc. Swarm administrators add `node.labels` for operational
     * purposes by using the [`node update endpoint`](#operation/NodeUpdate).
     *
     * @var list<string>
     */
    private $constraints;
    /**
     * Preferences provide a way to make the scheduler aware of factors
     * such as topology. They are provided in order from highest to
     * lowest precedence.
     *
     * @var list<TaskSpecPlacementPreferencesItem>
     */
    private $preferences;
    /**
     * Maximum number of replicas for per node (default value is 0, which
     * is unlimited).
     *
     * @var int
     */
    private $maxReplicas = 0;
    /**
     * Platforms stores all the platforms that the service's image can
     * run on. This field is used in the platform filter for scheduling.
     * If empty, then the platform filter is off, meaning there are no
     * scheduling restrictions.
     *
     * @var list<Platform>
     */
    private $platforms;

    /**
     * An array of constraint expressions to limit the set of nodes where
     * a task can be scheduled. Constraint expressions can either use a
     * _match_ (`==`) or _exclude_ (`!=`) rule. Multiple constraints find
     * nodes that satisfy every expression (AND match). Constraints can
     * match node or Docker Engine labels as follows:
     *
     * node attribute       | matches                        | example
     * ---------------------|--------------------------------|-----------------------------------------------
     * `node.id`            | Node ID                        | `node.id==2ivku8v2gvtg4`
     * `node.hostname`      | Node hostname                  | `node.hostname!=node-2`
     * `node.role`          | Node role (`manager`/`worker`) | `node.role==manager`
     * `node.platform.os`   | Node operating system          | `node.platform.os==windows`
     * `node.platform.arch` | Node architecture              | `node.platform.arch==x86_64`
     * `node.labels`        | User-defined node labels       | `node.labels.security==high`
     * `engine.labels`      | Docker Engine's labels         | `engine.labels.operatingsystem==ubuntu-24.04`
     *
     * `engine.labels` apply to Docker Engine labels like operating system,
     * drivers, etc. Swarm administrators add `node.labels` for operational
     * purposes by using the [`node update endpoint`](#operation/NodeUpdate).
     *
     * @return list<string>
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }

    /**
     * An array of constraint expressions to limit the set of nodes where
     * a task can be scheduled. Constraint expressions can either use a
     * _match_ (`==`) or _exclude_ (`!=`) rule. Multiple constraints find
     * nodes that satisfy every expression (AND match). Constraints can
     * match node or Docker Engine labels as follows:
     *
     * node attribute       | matches                        | example
     * ---------------------|--------------------------------|-----------------------------------------------
     * `node.id`            | Node ID                        | `node.id==2ivku8v2gvtg4`
     * `node.hostname`      | Node hostname                  | `node.hostname!=node-2`
     * `node.role`          | Node role (`manager`/`worker`) | `node.role==manager`
     * `node.platform.os`   | Node operating system          | `node.platform.os==windows`
     * `node.platform.arch` | Node architecture              | `node.platform.arch==x86_64`
     * `node.labels`        | User-defined node labels       | `node.labels.security==high`
     * `engine.labels`      | Docker Engine's labels         | `engine.labels.operatingsystem==ubuntu-24.04`
     *
     * `engine.labels` apply to Docker Engine labels like operating system,
     * drivers, etc. Swarm administrators add `node.labels` for operational
     * purposes by using the [`node update endpoint`](#operation/NodeUpdate).
     *
     * @param list<string> $constraints
     */
    public function setConstraints(array $constraints): self
    {
        $this->initialized['constraints'] = true;
        $this->constraints = $constraints;

        return $this;
    }

    /**
     * Preferences provide a way to make the scheduler aware of factors
     * such as topology. They are provided in order from highest to
     * lowest precedence.
     *
     * @return list<TaskSpecPlacementPreferencesItem>
     */
    public function getPreferences(): array
    {
        return $this->preferences;
    }

    /**
     * Preferences provide a way to make the scheduler aware of factors
     * such as topology. They are provided in order from highest to
     * lowest precedence.
     *
     * @param list<TaskSpecPlacementPreferencesItem> $preferences
     */
    public function setPreferences(array $preferences): self
    {
        $this->initialized['preferences'] = true;
        $this->preferences = $preferences;

        return $this;
    }

    /**
     * Maximum number of replicas for per node (default value is 0, which
     * is unlimited).
     */
    public function getMaxReplicas(): int
    {
        return $this->maxReplicas;
    }

    /**
     * Maximum number of replicas for per node (default value is 0, which
     * is unlimited).
     */
    public function setMaxReplicas(int $maxReplicas): self
    {
        $this->initialized['maxReplicas'] = true;
        $this->maxReplicas = $maxReplicas;

        return $this;
    }

    /**
     * Platforms stores all the platforms that the service's image can
     * run on. This field is used in the platform filter for scheduling.
     * If empty, then the platform filter is off, meaning there are no
     * scheduling restrictions.
     *
     * @return list<Platform>
     */
    public function getPlatforms(): array
    {
        return $this->platforms;
    }

    /**
     * Platforms stores all the platforms that the service's image can
     * run on. This field is used in the platform filter for scheduling.
     * If empty, then the platform filter is off, meaning there are no
     * scheduling restrictions.
     *
     * @param list<Platform> $platforms
     */
    public function setPlatforms(array $platforms): self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;

        return $this;
    }
}
