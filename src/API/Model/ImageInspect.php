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

final class ImageInspect
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
     * ID is the content-addressable ID of an image.
     *
     * This identifier is a content-addressable digest calculated from the
     * image's configuration (which includes the digests of layers used by
     * the image).
     *
     * Note that this digest differs from the `RepoDigests` below, which
     * holds digests of image manifests that reference the image.
     *
     * @var string
     */
    private $id;
    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor
     */
    private $descriptor;
    /**
     * Manifests is a list of image manifests available in this image. It
     * provides a more detailed view of the platform-specific image manifests or
     * other image-attached data like build attestations.
     *
     * Only available if the daemon provides a multi-platform image store
     * and the `manifests` option is set in the inspect request.
     *
     * WARNING: This is experimental and may change at any time without any backward
     * compatibility.
     *
     * @var null|list<ImageManifestSummary>
     */
    private $manifests;
    /**
     * Identity holds information about the identity and origin of the image.
     * This is trusted information verified by the daemon and cannot be modified
     * by tagging an image to a different name.
     *
     * @var Identity
     */
    private $identity;
    /**
     * List of image names/tags in the local image cache that reference this
     * image.
     *
     * Multiple image tags can refer to the same image, and this list may be
     * empty if no tags reference the image, in which case the image is
     * "untagged", in which case it can still be referenced by its ID.
     *
     * @var list<string>
     */
    private $repoTags;
    /**
     * List of content-addressable digests of locally available image manifests
     * that the image is referenced from. Multiple manifests can refer to the
     * same image.
     *
     * These digests are usually only available if the image was either pulled
     * from a registry, or if the image was pushed to a registry, which is when
     * the manifest is generated and its digest calculated.
     *
     * @var list<string>
     */
    private $repoDigests;
    /**
     * Optional message that was set when committing or importing the image.
     *
     * @var null|string
     */
    private $comment;
    /**
     * Date and time at which the image was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if present in the image,
     * and omitted otherwise.
     *
     * @var null|string
     */
    private $created;
    /**
     * Name of the author that was specified when committing the image, or as
     * specified through MAINTAINER (deprecated) in the Dockerfile.
     *
     * @var null|string
     */
    private $author;
    /**
     * Configuration of the image. These fields are used as defaults
     * when starting a container from the image.
     *
     * @var ImageConfig
     */
    private $config;
    /**
     * Hardware CPU architecture that the image runs on.
     *
     * @var string
     */
    private $architecture;
    /**
     * CPU architecture variant (presently ARM-only).
     *
     * @var null|string
     */
    private $variant;
    /**
     * Operating System the image is built to run on.
     *
     * @var string
     */
    private $os;
    /**
     * Operating System version the image is built to run on (especially
     * for Windows).
     *
     * @var null|string
     */
    private $osVersion;
    /**
     * Total size of the image including all layers it is composed of.
     *
     * @var int
     */
    private $size;
    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     *
     * @var DriverData
     */
    private $graphDriver;
    /**
     * Information about the image's RootFS, including the layer IDs.
     *
     * @var ImageInspectRootFS
     */
    private $rootFS;
    /**
     * Additional metadata of the image in the local cache. This information
     * is local to the daemon, and not part of the image itself.
     *
     * @var ImageInspectMetadata
     */
    private $metadata;

    /**
     * ID is the content-addressable ID of an image.
     *
     * This identifier is a content-addressable digest calculated from the
     * image's configuration (which includes the digests of layers used by
     * the image).
     *
     * Note that this digest differs from the `RepoDigests` below, which
     * holds digests of image manifests that reference the image.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * ID is the content-addressable ID of an image.
     *
     * This identifier is a content-addressable digest calculated from the
     * image's configuration (which includes the digests of layers used by
     * the image).
     *
     * Note that this digest differs from the `RepoDigests` below, which
     * holds digests of image manifests that reference the image.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

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
     * Manifests is a list of image manifests available in this image. It
     * provides a more detailed view of the platform-specific image manifests or
     * other image-attached data like build attestations.
     *
     * Only available if the daemon provides a multi-platform image store
     * and the `manifests` option is set in the inspect request.
     *
     * WARNING: This is experimental and may change at any time without any backward
     * compatibility.
     *
     * @return null|list<ImageManifestSummary>
     */
    public function getManifests(): ?array
    {
        return $this->manifests;
    }

    /**
     * Manifests is a list of image manifests available in this image. It
     * provides a more detailed view of the platform-specific image manifests or
     * other image-attached data like build attestations.
     *
     * Only available if the daemon provides a multi-platform image store
     * and the `manifests` option is set in the inspect request.
     *
     * WARNING: This is experimental and may change at any time without any backward
     * compatibility.
     *
     * @param null|list<ImageManifestSummary> $manifests
     */
    public function setManifests(?array $manifests): self
    {
        $this->initialized['manifests'] = true;
        $this->manifests = $manifests;

        return $this;
    }

    /**
     * Identity holds information about the identity and origin of the image.
     * This is trusted information verified by the daemon and cannot be modified
     * by tagging an image to a different name.
     */
    public function getIdentity(): Identity
    {
        return $this->identity;
    }

    /**
     * Identity holds information about the identity and origin of the image.
     * This is trusted information verified by the daemon and cannot be modified
     * by tagging an image to a different name.
     */
    public function setIdentity(Identity $identity): self
    {
        $this->initialized['identity'] = true;
        $this->identity = $identity;

        return $this;
    }

    /**
     * List of image names/tags in the local image cache that reference this
     * image.
     *
     * Multiple image tags can refer to the same image, and this list may be
     * empty if no tags reference the image, in which case the image is
     * "untagged", in which case it can still be referenced by its ID.
     *
     * @return list<string>
     */
    public function getRepoTags(): array
    {
        return $this->repoTags;
    }

    /**
     * List of image names/tags in the local image cache that reference this
     * image.
     *
     * Multiple image tags can refer to the same image, and this list may be
     * empty if no tags reference the image, in which case the image is
     * "untagged", in which case it can still be referenced by its ID.
     *
     * @param list<string> $repoTags
     */
    public function setRepoTags(array $repoTags): self
    {
        $this->initialized['repoTags'] = true;
        $this->repoTags = $repoTags;

        return $this;
    }

    /**
     * List of content-addressable digests of locally available image manifests
     * that the image is referenced from. Multiple manifests can refer to the
     * same image.
     *
     * These digests are usually only available if the image was either pulled
     * from a registry, or if the image was pushed to a registry, which is when
     * the manifest is generated and its digest calculated.
     *
     * @return list<string>
     */
    public function getRepoDigests(): array
    {
        return $this->repoDigests;
    }

    /**
     * List of content-addressable digests of locally available image manifests
     * that the image is referenced from. Multiple manifests can refer to the
     * same image.
     *
     * These digests are usually only available if the image was either pulled
     * from a registry, or if the image was pushed to a registry, which is when
     * the manifest is generated and its digest calculated.
     *
     * @param list<string> $repoDigests
     */
    public function setRepoDigests(array $repoDigests): self
    {
        $this->initialized['repoDigests'] = true;
        $this->repoDigests = $repoDigests;

        return $this;
    }

    /**
     * Optional message that was set when committing or importing the image.
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Optional message that was set when committing or importing the image.
     */
    public function setComment(?string $comment): self
    {
        $this->initialized['comment'] = true;
        $this->comment = $comment;

        return $this;
    }

    /**
     * Date and time at which the image was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if present in the image,
     * and omitted otherwise.
     */
    public function getCreated(): ?string
    {
        return $this->created;
    }

    /**
     * Date and time at which the image was created, formatted in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if present in the image,
     * and omitted otherwise.
     */
    public function setCreated(?string $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * Name of the author that was specified when committing the image, or as
     * specified through MAINTAINER (deprecated) in the Dockerfile.
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * Name of the author that was specified when committing the image, or as
     * specified through MAINTAINER (deprecated) in the Dockerfile.
     */
    public function setAuthor(?string $author): self
    {
        $this->initialized['author'] = true;
        $this->author = $author;

        return $this;
    }

    /**
     * Configuration of the image. These fields are used as defaults
     * when starting a container from the image.
     */
    public function getConfig(): ImageConfig
    {
        return $this->config;
    }

    /**
     * Configuration of the image. These fields are used as defaults
     * when starting a container from the image.
     */
    public function setConfig(ImageConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * Hardware CPU architecture that the image runs on.
     */
    public function getArchitecture(): string
    {
        return $this->architecture;
    }

    /**
     * Hardware CPU architecture that the image runs on.
     */
    public function setArchitecture(string $architecture): self
    {
        $this->initialized['architecture'] = true;
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * CPU architecture variant (presently ARM-only).
     */
    public function getVariant(): ?string
    {
        return $this->variant;
    }

    /**
     * CPU architecture variant (presently ARM-only).
     */
    public function setVariant(?string $variant): self
    {
        $this->initialized['variant'] = true;
        $this->variant = $variant;

        return $this;
    }

    /**
     * Operating System the image is built to run on.
     */
    public function getOs(): string
    {
        return $this->os;
    }

    /**
     * Operating System the image is built to run on.
     */
    public function setOs(string $os): self
    {
        $this->initialized['os'] = true;
        $this->os = $os;

        return $this;
    }

    /**
     * Operating System version the image is built to run on (especially
     * for Windows).
     */
    public function getOsVersion(): ?string
    {
        return $this->osVersion;
    }

    /**
     * Operating System version the image is built to run on (especially
     * for Windows).
     */
    public function setOsVersion(?string $osVersion): self
    {
        $this->initialized['osVersion'] = true;
        $this->osVersion = $osVersion;

        return $this;
    }

    /**
     * Total size of the image including all layers it is composed of.
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Total size of the image including all layers it is composed of.
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     */
    public function getGraphDriver(): DriverData
    {
        return $this->graphDriver;
    }

    /**
     * Information about the storage driver used to store the container's and
     * image's filesystem.
     */
    public function setGraphDriver(DriverData $graphDriver): self
    {
        $this->initialized['graphDriver'] = true;
        $this->graphDriver = $graphDriver;

        return $this;
    }

    /**
     * Information about the image's RootFS, including the layer IDs.
     */
    public function getRootFS(): ImageInspectRootFS
    {
        return $this->rootFS;
    }

    /**
     * Information about the image's RootFS, including the layer IDs.
     */
    public function setRootFS(ImageInspectRootFS $rootFS): self
    {
        $this->initialized['rootFS'] = true;
        $this->rootFS = $rootFS;

        return $this;
    }

    /**
     * Additional metadata of the image in the local cache. This information
     * is local to the daemon, and not part of the image itself.
     */
    public function getMetadata(): ImageInspectMetadata
    {
        return $this->metadata;
    }

    /**
     * Additional metadata of the image in the local cache. This information
     * is local to the daemon, and not part of the image itself.
     */
    public function setMetadata(ImageInspectMetadata $metadata): self
    {
        $this->initialized['metadata'] = true;
        $this->metadata = $metadata;

        return $this;
    }
}
