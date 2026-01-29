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

final class EventMessage
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
     * The type of object emitting the event.
     *
     * @var string
     */
    private $type;
    /**
     * The type of event.
     *
     * @var string
     */
    private $action;
    /**
     * Actor describes something that generates events, like a container, network,
     * or a volume.
     *
     * @var EventActor
     */
    private $actor;
    /**
     * Scope of the event. Engine events are `local` scope. Cluster (Swarm)
     * events are `swarm` scope.
     *
     * @var string
     */
    private $scope;
    /**
     * Timestamp of event.
     *
     * @var int
     */
    private $time;
    /**
     * Timestamp of event, with nanosecond accuracy.
     *
     * @var int
     */
    private $timeNano;

    /**
     * The type of object emitting the event.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of object emitting the event.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The type of event.
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * The type of event.
     */
    public function setAction(string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;

        return $this;
    }

    /**
     * Actor describes something that generates events, like a container, network,
     * or a volume.
     */
    public function getActor(): EventActor
    {
        return $this->actor;
    }

    /**
     * Actor describes something that generates events, like a container, network,
     * or a volume.
     */
    public function setActor(EventActor $actor): self
    {
        $this->initialized['actor'] = true;
        $this->actor = $actor;

        return $this;
    }

    /**
     * Scope of the event. Engine events are `local` scope. Cluster (Swarm)
     * events are `swarm` scope.
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * Scope of the event. Engine events are `local` scope. Cluster (Swarm)
     * events are `swarm` scope.
     */
    public function setScope(string $scope): self
    {
        $this->initialized['scope'] = true;
        $this->scope = $scope;

        return $this;
    }

    /**
     * Timestamp of event.
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * Timestamp of event.
     */
    public function setTime(int $time): self
    {
        $this->initialized['time'] = true;
        $this->time = $time;

        return $this;
    }

    /**
     * Timestamp of event, with nanosecond accuracy.
     */
    public function getTimeNano(): int
    {
        return $this->timeNano;
    }

    /**
     * Timestamp of event, with nanosecond accuracy.
     */
    public function setTimeNano(int $timeNano): self
    {
        $this->initialized['timeNano'] = true;
        $this->timeNano = $timeNano;

        return $this;
    }
}
