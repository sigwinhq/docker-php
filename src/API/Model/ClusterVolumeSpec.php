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

final class ClusterVolumeSpec
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
     * Group defines the volume group of this volume. Volumes belonging to
     * the same group can be referred to by group name when creating
     * Services.  Referring to a volume by group instructs Swarm to treat
     * volumes in that group interchangeably for the purpose of scheduling.
     * Volumes with an empty string for a group technically all belong to
     * the same, emptystring group.
     *
     * @var string
     */
    private $group;
    /**
     * Defines how the volume is used by tasks.
     *
     * @var ClusterVolumeSpecAccessMode
     */
    private $accessMode;

    /**
     * Group defines the volume group of this volume. Volumes belonging to
     * the same group can be referred to by group name when creating
     * Services.  Referring to a volume by group instructs Swarm to treat
     * volumes in that group interchangeably for the purpose of scheduling.
     * Volumes with an empty string for a group technically all belong to
     * the same, emptystring group.
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * Group defines the volume group of this volume. Volumes belonging to
     * the same group can be referred to by group name when creating
     * Services.  Referring to a volume by group instructs Swarm to treat
     * volumes in that group interchangeably for the purpose of scheduling.
     * Volumes with an empty string for a group technically all belong to
     * the same, emptystring group.
     */
    public function setGroup(string $group): self
    {
        $this->initialized['group'] = true;
        $this->group = $group;

        return $this;
    }

    /**
     * Defines how the volume is used by tasks.
     */
    public function getAccessMode(): ClusterVolumeSpecAccessMode
    {
        return $this->accessMode;
    }

    /**
     * Defines how the volume is used by tasks.
     */
    public function setAccessMode(ClusterVolumeSpecAccessMode $accessMode): self
    {
        $this->initialized['accessMode'] = true;
        $this->accessMode = $accessMode;

        return $this;
    }
}
