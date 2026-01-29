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

final class ContainerSummary
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
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     *
     * @var string
     */
    private $id;
    /**
     * The names associated with this container. Most containers have a single
     * name, but when using legacy "links", the container can have multiple
     * names.
     *
     * For historic reasons, names are prefixed with a forward-slash (`/`).
     *
     * @var list<string>
     */
    private $names;
    /**
     * The name or ID of the image used to create the container.
     *
     * This field shows the image reference as was specified when creating the container,
     * which can be in its canonical form (e.g., `docker.io/library/ubuntu:latest`
     * or `docker.io/library/ubuntu@sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`),
     * short form (e.g., `ubuntu:latest`)), or the ID(-prefix) of the image (e.g., `72297848456d`).
     *
     * The content of this field can be updated at runtime if the image used to
     * create the container is untagged, in which case the field is updated to
     * contain the the image ID (digest) it was resolved to in its canonical,
     * non-truncated form (e.g., `sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`).
     *
     * @var string
     */
    private $image;
    /**
     * The ID (digest) of the image that this container was created from.
     *
     * @var string
     */
    private $imageID;
    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     *
     * @var OCIDescriptor
     */
    private $imageManifestDescriptor;
    /**
     * Command to run when starting the container.
     *
     * @var string
     */
    private $command;
    /**
     * Date and time at which the container was created as a Unix timestamp
     * (number of seconds since EPOCH).
     *
     * @var int
     */
    private $created;
    /**
     * Port-mappings for the container.
     *
     * @var list<PortSummary>
     */
    private $ports;
    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     *
     * @var null|int
     */
    private $sizeRw;
    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     *
     * @var null|int
     */
    private $sizeRootFs;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    private $labels;
    /**
     * The state of this container.
     *
     * @var string
     */
    private $state;
    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     *
     * @var string
     */
    private $status;
    /**
     * Summary of host-specific runtime information of the container. This
     * is a reduced set of information in the container's "HostConfig" as
     * available in the container "inspect" response.
     *
     * @var ContainerSummaryHostConfig
     */
    private $hostConfig;
    /**
     * Summary of the container's network settings.
     *
     * @var ContainerSummaryNetworkSettings
     */
    private $networkSettings;
    /**
     * List of mounts used by the container.
     *
     * @var list<MountPoint>
     */
    private $mounts;
    /**
     * Summary of health status.
     *
     * Added in v1.52, before that version all container summary not include Health.
     * After this attribute introduced, it includes containers with no health checks configured,
     * or containers that are not running with none
     *
     * @var ContainerSummaryHealth
     */
    private $health;

    /**
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of this container as a 128-bit (64-character) hexadecimal string (32 bytes).
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The names associated with this container. Most containers have a single
     * name, but when using legacy "links", the container can have multiple
     * names.
     *
     * For historic reasons, names are prefixed with a forward-slash (`/`).
     *
     * @return list<string>
     */
    public function getNames(): array
    {
        return $this->names;
    }

    /**
     * The names associated with this container. Most containers have a single
     * name, but when using legacy "links", the container can have multiple
     * names.
     *
     * For historic reasons, names are prefixed with a forward-slash (`/`).
     *
     * @param list<string> $names
     */
    public function setNames(array $names): self
    {
        $this->initialized['names'] = true;
        $this->names = $names;

        return $this;
    }

    /**
     * The name or ID of the image used to create the container.
     *
     * This field shows the image reference as was specified when creating the container,
     * which can be in its canonical form (e.g., `docker.io/library/ubuntu:latest`
     * or `docker.io/library/ubuntu@sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`),
     * short form (e.g., `ubuntu:latest`)), or the ID(-prefix) of the image (e.g., `72297848456d`).
     *
     * The content of this field can be updated at runtime if the image used to
     * create the container is untagged, in which case the field is updated to
     * contain the the image ID (digest) it was resolved to in its canonical,
     * non-truncated form (e.g., `sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`).
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * The name or ID of the image used to create the container.
     *
     * This field shows the image reference as was specified when creating the container,
     * which can be in its canonical form (e.g., `docker.io/library/ubuntu:latest`
     * or `docker.io/library/ubuntu@sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`),
     * short form (e.g., `ubuntu:latest`)), or the ID(-prefix) of the image (e.g., `72297848456d`).
     *
     * The content of this field can be updated at runtime if the image used to
     * create the container is untagged, in which case the field is updated to
     * contain the the image ID (digest) it was resolved to in its canonical,
     * non-truncated form (e.g., `sha256:72297848456d5d37d1262630108ab308d3e9ec7ed1c3286a32fe09856619a782`).
     */
    public function setImage(string $image): self
    {
        $this->initialized['image'] = true;
        $this->image = $image;

        return $this;
    }

    /**
     * The ID (digest) of the image that this container was created from.
     */
    public function getImageID(): string
    {
        return $this->imageID;
    }

    /**
     * The ID (digest) of the image that this container was created from.
     */
    public function setImageID(string $imageID): self
    {
        $this->initialized['imageID'] = true;
        $this->imageID = $imageID;

        return $this;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function getImageManifestDescriptor(): OCIDescriptor
    {
        return $this->imageManifestDescriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size, as defined in
     * the [OCI Content Descriptors Specification](https://github.com/opencontainers/image-spec/blob/v1.0.1/descriptor.md).
     */
    public function setImageManifestDescriptor(OCIDescriptor $imageManifestDescriptor): self
    {
        $this->initialized['imageManifestDescriptor'] = true;
        $this->imageManifestDescriptor = $imageManifestDescriptor;

        return $this;
    }

    /**
     * Command to run when starting the container.
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * Command to run when starting the container.
     */
    public function setCommand(string $command): self
    {
        $this->initialized['command'] = true;
        $this->command = $command;

        return $this;
    }

    /**
     * Date and time at which the container was created as a Unix timestamp
     * (number of seconds since EPOCH).
     */
    public function getCreated(): int
    {
        return $this->created;
    }

    /**
     * Date and time at which the container was created as a Unix timestamp
     * (number of seconds since EPOCH).
     */
    public function setCreated(int $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;

        return $this;
    }

    /**
     * Port-mappings for the container.
     *
     * @return list<PortSummary>
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * Port-mappings for the container.
     *
     * @param list<PortSummary> $ports
     */
    public function setPorts(array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;

        return $this;
    }

    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function getSizeRw(): ?int
    {
        return $this->sizeRw;
    }

    /**
     * The size of files that have been created or changed by this container.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function setSizeRw(?int $sizeRw): self
    {
        $this->initialized['sizeRw'] = true;
        $this->sizeRw = $sizeRw;

        return $this;
    }

    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function getSizeRootFs(): ?int
    {
        return $this->sizeRootFs;
    }

    /**
     * The total size of all files in the read-only layers from the image
     * that the container uses. These layers can be shared between containers.
     *
     * This field is omitted by default, and only set when size is requested
     * in the API request.
     */
    public function setSizeRootFs(?int $sizeRootFs): self
    {
        $this->initialized['sizeRootFs'] = true;
        $this->sizeRootFs = $sizeRootFs;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * The state of this container.
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * The state of this container.
     */
    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Additional human-readable status of this container (e.g. `Exit 0`).
     */
    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Summary of host-specific runtime information of the container. This
     * is a reduced set of information in the container's "HostConfig" as
     * available in the container "inspect" response.
     */
    public function getHostConfig(): ContainerSummaryHostConfig
    {
        return $this->hostConfig;
    }

    /**
     * Summary of host-specific runtime information of the container. This
     * is a reduced set of information in the container's "HostConfig" as
     * available in the container "inspect" response.
     */
    public function setHostConfig(ContainerSummaryHostConfig $hostConfig): self
    {
        $this->initialized['hostConfig'] = true;
        $this->hostConfig = $hostConfig;

        return $this;
    }

    /**
     * Summary of the container's network settings.
     */
    public function getNetworkSettings(): ContainerSummaryNetworkSettings
    {
        return $this->networkSettings;
    }

    /**
     * Summary of the container's network settings.
     */
    public function setNetworkSettings(ContainerSummaryNetworkSettings $networkSettings): self
    {
        $this->initialized['networkSettings'] = true;
        $this->networkSettings = $networkSettings;

        return $this;
    }

    /**
     * List of mounts used by the container.
     *
     * @return list<MountPoint>
     */
    public function getMounts(): array
    {
        return $this->mounts;
    }

    /**
     * List of mounts used by the container.
     *
     * @param list<MountPoint> $mounts
     */
    public function setMounts(array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;

        return $this;
    }

    /**
     * Summary of health status.
     *
     * Added in v1.52, before that version all container summary not include Health.
     * After this attribute introduced, it includes containers with no health checks configured,
     * or containers that are not running with none
     */
    public function getHealth(): ContainerSummaryHealth
    {
        return $this->health;
    }

    /**
     * Summary of health status.
     *
     * Added in v1.52, before that version all container summary not include Health.
     * After this attribute introduced, it includes containers with no health checks configured,
     * or containers that are not running with none
     */
    public function setHealth(ContainerSummaryHealth $health): self
    {
        $this->initialized['health'] = true;
        $this->health = $health;

        return $this;
    }
}
