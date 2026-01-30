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

final class NodeStatus
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
     * NodeState represents the state of a node.
     *
     * @var string
     */
    private $state;
    /**
     * @var string
     */
    private $message;
    /**
     * IP address of the node.
     *
     * @var string
     */
    private $addr;

    /**
     * NodeState represents the state of a node.
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * NodeState represents the state of a node.
     */
    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;

        return $this;
    }

    /**
     * IP address of the node.
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * IP address of the node.
     */
    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;

        return $this;
    }
}
