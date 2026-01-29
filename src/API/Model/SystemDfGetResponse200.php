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

final class SystemDfGetResponse200
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
     * represents system data usage for image resources.
     *
     * @var ImagesDiskUsage
     */
    private $imagesDiskUsage;
    /**
     * represents system data usage information for container resources.
     *
     * @var ContainersDiskUsage
     */
    private $containersDiskUsage;
    /**
     * represents system data usage for volume resources.
     *
     * @var VolumesDiskUsage
     */
    private $volumesDiskUsage;
    /**
     * represents system data usage for build cache resources.
     *
     * @var BuildCacheDiskUsage
     */
    private $buildCacheDiskUsage;

    /**
     * represents system data usage for image resources.
     */
    public function getImagesDiskUsage(): ImagesDiskUsage
    {
        return $this->imagesDiskUsage;
    }

    /**
     * represents system data usage for image resources.
     */
    public function setImagesDiskUsage(ImagesDiskUsage $imagesDiskUsage): self
    {
        $this->initialized['imagesDiskUsage'] = true;
        $this->imagesDiskUsage = $imagesDiskUsage;

        return $this;
    }

    /**
     * represents system data usage information for container resources.
     */
    public function getContainersDiskUsage(): ContainersDiskUsage
    {
        return $this->containersDiskUsage;
    }

    /**
     * represents system data usage information for container resources.
     */
    public function setContainersDiskUsage(ContainersDiskUsage $containersDiskUsage): self
    {
        $this->initialized['containersDiskUsage'] = true;
        $this->containersDiskUsage = $containersDiskUsage;

        return $this;
    }

    /**
     * represents system data usage for volume resources.
     */
    public function getVolumesDiskUsage(): VolumesDiskUsage
    {
        return $this->volumesDiskUsage;
    }

    /**
     * represents system data usage for volume resources.
     */
    public function setVolumesDiskUsage(VolumesDiskUsage $volumesDiskUsage): self
    {
        $this->initialized['volumesDiskUsage'] = true;
        $this->volumesDiskUsage = $volumesDiskUsage;

        return $this;
    }

    /**
     * represents system data usage for build cache resources.
     */
    public function getBuildCacheDiskUsage(): BuildCacheDiskUsage
    {
        return $this->buildCacheDiskUsage;
    }

    /**
     * represents system data usage for build cache resources.
     */
    public function setBuildCacheDiskUsage(BuildCacheDiskUsage $buildCacheDiskUsage): self
    {
        $this->initialized['buildCacheDiskUsage'] = true;
        $this->buildCacheDiskUsage = $buildCacheDiskUsage;

        return $this;
    }
}
