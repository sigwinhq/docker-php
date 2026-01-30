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

final class NodeSpec
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
     * Name for the node.
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
     * Role of the node.
     *
     * @var string
     */
    private $role;
    /**
     * Availability of the node.
     *
     * @var string
     */
    private $availability;

    /**
     * Name for the node.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name for the node.
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
     * Role of the node.
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Role of the node.
     */
    public function setRole(string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;

        return $this;
    }

    /**
     * Availability of the node.
     */
    public function getAvailability(): string
    {
        return $this->availability;
    }

    /**
     * Availability of the node.
     */
    public function setAvailability(string $availability): self
    {
        $this->initialized['availability'] = true;
        $this->availability = $availability;

        return $this;
    }
}
