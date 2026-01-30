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

final class RootFSStorage
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
     * Information about a snapshot backend of the container's root filesystem.
     *
     * @var RootFSStorageSnapshot
     */
    private $snapshot;

    /**
     * Information about a snapshot backend of the container's root filesystem.
     */
    public function getSnapshot(): RootFSStorageSnapshot
    {
        return $this->snapshot;
    }

    /**
     * Information about a snapshot backend of the container's root filesystem.
     */
    public function setSnapshot(RootFSStorageSnapshot $snapshot): self
    {
        $this->initialized['snapshot'] = true;
        $this->snapshot = $snapshot;

        return $this;
    }
}
