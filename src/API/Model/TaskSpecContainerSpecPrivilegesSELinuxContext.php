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

final class TaskSpecContainerSpecPrivilegesSELinuxContext
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
     * Disable SELinux.
     *
     * @var bool
     */
    private $disable;
    /**
     * SELinux user label.
     *
     * @var string
     */
    private $user;
    /**
     * SELinux role label.
     *
     * @var string
     */
    private $role;
    /**
     * SELinux type label.
     *
     * @var string
     */
    private $type;
    /**
     * SELinux level label.
     *
     * @var string
     */
    private $level;

    /**
     * Disable SELinux.
     */
    public function getDisable(): bool
    {
        return $this->disable;
    }

    /**
     * Disable SELinux.
     */
    public function setDisable(bool $disable): self
    {
        $this->initialized['disable'] = true;
        $this->disable = $disable;

        return $this;
    }

    /**
     * SELinux user label.
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * SELinux user label.
     */
    public function setUser(string $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    /**
     * SELinux role label.
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * SELinux role label.
     */
    public function setRole(string $role): self
    {
        $this->initialized['role'] = true;
        $this->role = $role;

        return $this;
    }

    /**
     * SELinux type label.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * SELinux type label.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * SELinux level label.
     */
    public function getLevel(): string
    {
        return $this->level;
    }

    /**
     * SELinux level label.
     */
    public function setLevel(string $level): self
    {
        $this->initialized['level'] = true;
        $this->level = $level;

        return $this;
    }
}
