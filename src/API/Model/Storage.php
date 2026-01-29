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

final class Storage
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
     * Information about the storage used for the container's root filesystem.
     *
     * @var RootFSStorage
     */
    private $rootFS;

    /**
     * Information about the storage used for the container's root filesystem.
     */
    public function getRootFS(): RootFSStorage
    {
        return $this->rootFS;
    }

    /**
     * Information about the storage used for the container's root filesystem.
     */
    public function setRootFS(RootFSStorage $rootFS): self
    {
        $this->initialized['rootFS'] = true;
        $this->rootFS = $rootFS;

        return $this;
    }
}
