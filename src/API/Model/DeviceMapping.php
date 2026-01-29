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

final class DeviceMapping
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
     * @var string
     */
    private $pathOnHost;
    /**
     * @var string
     */
    private $pathInContainer;
    /**
     * @var string
     */
    private $cgroupPermissions;

    public function getPathOnHost(): string
    {
        return $this->pathOnHost;
    }

    public function setPathOnHost(string $pathOnHost): self
    {
        $this->initialized['pathOnHost'] = true;
        $this->pathOnHost = $pathOnHost;

        return $this;
    }

    public function getPathInContainer(): string
    {
        return $this->pathInContainer;
    }

    public function setPathInContainer(string $pathInContainer): self
    {
        $this->initialized['pathInContainer'] = true;
        $this->pathInContainer = $pathInContainer;

        return $this;
    }

    public function getCgroupPermissions(): string
    {
        return $this->cgroupPermissions;
    }

    public function setCgroupPermissions(string $cgroupPermissions): self
    {
        $this->initialized['cgroupPermissions'] = true;
        $this->cgroupPermissions = $cgroupPermissions;

        return $this;
    }
}
