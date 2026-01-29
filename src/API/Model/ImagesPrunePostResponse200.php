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

final class ImagesPrunePostResponse200
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
     * Images that were deleted.
     *
     * @var list<ImageDeleteResponseItem>
     */
    private $imagesDeleted;
    /**
     * Disk space reclaimed in bytes.
     *
     * @var int
     */
    private $spaceReclaimed;

    /**
     * Images that were deleted.
     *
     * @return list<ImageDeleteResponseItem>
     */
    public function getImagesDeleted(): array
    {
        return $this->imagesDeleted;
    }

    /**
     * Images that were deleted.
     *
     * @param list<ImageDeleteResponseItem> $imagesDeleted
     */
    public function setImagesDeleted(array $imagesDeleted): self
    {
        $this->initialized['imagesDeleted'] = true;
        $this->imagesDeleted = $imagesDeleted;

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
