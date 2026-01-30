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

final class DistributionInspect
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
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor
     */
    private $descriptor;
    /**
     * An array containing all platforms supported by the image.
     *
     * @var list<OCIPlatform>
     */
    private $platforms;

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function getDescriptor(): OCIDescriptor
    {
        return $this->descriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function setDescriptor(OCIDescriptor $descriptor): self
    {
        $this->initialized['descriptor'] = true;
        $this->descriptor = $descriptor;

        return $this;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @return list<OCIPlatform>
     */
    public function getPlatforms(): array
    {
        return $this->platforms;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @param list<OCIPlatform> $platforms
     */
    public function setPlatforms(array $platforms): self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;

        return $this;
    }
}
