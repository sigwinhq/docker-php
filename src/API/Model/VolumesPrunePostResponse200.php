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

final class VolumesPrunePostResponse200
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
     * Volumes that were deleted.
     *
     * @var list<string>
     */
    private $volumesDeleted;
    /**
     * Disk space reclaimed in bytes.
     *
     * @var int
     */
    private $spaceReclaimed;

    /**
     * Volumes that were deleted.
     *
     * @return list<string>
     */
    public function getVolumesDeleted(): array
    {
        return $this->volumesDeleted;
    }

    /**
     * Volumes that were deleted.
     *
     * @param list<string> $volumesDeleted
     */
    public function setVolumesDeleted(array $volumesDeleted): self
    {
        $this->initialized['volumesDeleted'] = true;
        $this->volumesDeleted = $volumesDeleted;

        return $this;
    }

    /**
     * Disk space reclaimed in bytes.
     */
    public function getSpaceReclaimed(): int
    {
        return $this->spaceReclaimed;
    }

    /**
     * Disk space reclaimed in bytes.
     */
    public function setSpaceReclaimed(int $spaceReclaimed): self
    {
        $this->initialized['spaceReclaimed'] = true;
        $this->spaceReclaimed = $spaceReclaimed;

        return $this;
    }
}
