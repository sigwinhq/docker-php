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

final class OCIDescriptor
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
     * The media type of the object this schema refers to.
     *
     * @var string
     */
    private $mediaType;
    /**
     * The digest of the targeted content.
     *
     * @var string
     */
    private $digest;
    /**
     * The size in bytes of the blob.
     *
     * @var int
     */
    private $size;
    /**
     * List of URLs from which this object MAY be downloaded.
     *
     * @var null|list<string>
     */
    private $urls;
    /**
     * Arbitrary metadata relating to the targeted content.
     *
     * @var null|array<string, string>
     */
    private $annotations;
    /**
     * Data is an embedding of the targeted content. This is encoded as a base64
     * string when marshalled to JSON (automatically, by encoding/json). If
     * present, Data can be used directly to avoid fetching the targeted content.
     *
     * @var null|string
     */
    private $data;
    /**
     * Describes the platform which the image in the manifest runs on, as defined
     * in the [OCI Image Index Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/image-index.md).
     *
     * @var null|OCIPlatform
     */
    private $platform;
    /**
     * ArtifactType is the IANA media type of this artifact.
     *
     * @var null|string
     */
    private $artifactType;

    /**
     * The media type of the object this schema refers to.
     */
    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    /**
     * The media type of the object this schema refers to.
     */
    public function setMediaType(string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;

        return $this;
    }

    /**
     * The digest of the targeted content.
     */
    public function getDigest(): string
    {
        return $this->digest;
    }

    /**
     * The digest of the targeted content.
     */
    public function setDigest(string $digest): self
    {
        $this->initialized['digest'] = true;
        $this->digest = $digest;

        return $this;
    }

    /**
     * The size in bytes of the blob.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * The size in bytes of the blob.
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * List of URLs from which this object MAY be downloaded.
     *
     * @return null|list<string>
     */
    public function getUrls(): ?array
    {
        return $this->urls;
    }

    /**
     * List of URLs from which this object MAY be downloaded.
     *
     * @param null|list<string> $urls
     */
    public function setUrls(?array $urls): self
    {
        $this->initialized['urls'] = true;
        $this->urls = $urls;

        return $this;
    }

    /**
     * Arbitrary metadata relating to the targeted content.
     *
     * @return null|array<string, string>
     */
    public function getAnnotations(): ?iterable
    {
        return $this->annotations;
    }

    /**
     * Arbitrary metadata relating to the targeted content.
     *
     * @param null|array<string, string> $annotations
     */
    public function setAnnotations(?iterable $annotations): self
    {
        $this->initialized['annotations'] = true;
        $this->annotations = $annotations;

        return $this;
    }

    /**
     * Data is an embedding of the targeted content. This is encoded as a base64
     * string when marshalled to JSON (automatically, by encoding/json). If
     * present, Data can be used directly to avoid fetching the targeted content.
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * Data is an embedding of the targeted content. This is encoded as a base64
     * string when marshalled to JSON (automatically, by encoding/json). If
     * present, Data can be used directly to avoid fetching the targeted content.
     */
    public function setData(?string $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }

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
     * ArtifactType is the IANA media type of this artifact.
     */
    public function getArtifactType(): ?string
    {
        return $this->artifactType;
    }

    /**
     * ArtifactType is the IANA media type of this artifact.
     */
    public function setArtifactType(?string $artifactType): self
    {
        $this->initialized['artifactType'] = true;
        $this->artifactType = $artifactType;

        return $this;
    }
}
