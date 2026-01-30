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

final class VolumeUsageData
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
     * Amount of disk space used by the volume (in bytes). This information
     * is only available for volumes created with the `"local"` volume
     * driver. For volumes created with other volume drivers, this field
     * is set to `-1` ("not available").
     *
     * @var int
     */
    private $size = -1;
    /**
     * The number of containers referencing this volume. This field
     * is set to `-1` if the reference-count is not available.
     *
     * @var int
     */
    private $refCount = -1;

    /**
     * Amount of disk space used by the volume (in bytes). This information
     * is only available for volumes created with the `"local"` volume
     * driver. For volumes created with other volume drivers, this field
     * is set to `-1` ("not available").
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Amount of disk space used by the volume (in bytes). This information
     * is only available for volumes created with the `"local"` volume
     * driver. For volumes created with other volume drivers, this field
     * is set to `-1` ("not available").
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * The number of containers referencing this volume. This field
     * is set to `-1` if the reference-count is not available.
     */
    public function getRefCount(): int
    {
        return $this->refCount;
    }

    /**
     * The number of containers referencing this volume. This field
     * is set to `-1` if the reference-count is not available.
     */
    public function setRefCount(int $refCount): self
    {
        $this->initialized['refCount'] = true;
        $this->refCount = $refCount;

        return $this;
    }
}
