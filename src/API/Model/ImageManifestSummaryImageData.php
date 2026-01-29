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

final class ImageManifestSummaryImageData
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
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     *
     * @var null|OCIPlatform
     */
    private $platform;
    /**
     * The IDs of the containers that are using this image.
     *
     * @var list<string>
     */
    private $containers;
    /**
     * @var ImageManifestSummaryImageDataSize
     */
    private $size;

    /**
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     */
    public function getPlatform(): ?OCIPlatform
    {
        return $this->platform;
    }

    /**
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     */
    public function setPlatform(?OCIPlatform $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }

    /**
     * The IDs of the containers that are using this image.
     *
     * @return list<string>
     */
    public function getContainers(): array
    {
        return $this->containers;
    }

    /**
     * The IDs of the containers that are using this image.
     *
     * @param list<string> $containers
     */
    public function setContainers(array $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    public function getSize(): ImageManifestSummaryImageDataSize
    {
        return $this->size;
    }

    public function setSize(ImageManifestSummaryImageDataSize $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }
}
