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

final class Task
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
     * The ID of the task.
     *
     * @var string
     */
    private $iD;
    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     *
     * @var ObjectVersion
     */
    private $version;
    /**
     * @var string
     */
    private $createdAt;
    /**
     * @var string
     */
    private $updatedAt;
    /**
     * Name of the task.
     *
     * @var string
     */
    private $name;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    private $labels;
    /**
     * User modifiable task configuration.
     *
     * @var TaskSpec
     */
    private $spec;
    /**
     * The ID of the service this task is part of.
     *
     * @var string
     */
    private $serviceID;
    /**
     * @var int
     */
    private $slot;
    /**
     * The ID of the node that this task is on.
     *
     * @var string
     */
    private $nodeID;
    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @var list<GenericResourcesItem>
     */
    private $assignedGenericResources;
    /**
     * represents the status of a task.
     *
     * @var TaskStatus
     */
    private $status;
    /**
     * @var string
     */
    private $desiredState;
    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     *
     * @var ObjectVersion
     */
    private $jobIteration;

    /**
     * The ID of the task.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the task.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     */
    public function getVersion(): ObjectVersion
    {
        return $this->version;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     */
    public function setVersion(ObjectVersion $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Name of the task.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the task.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

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
     * User modifiable task configuration.
     */
    public function getSpec(): TaskSpec
    {
        return $this->spec;
    }

    /**
     * User modifiable task configuration.
     */
    public function setSpec(TaskSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;

        return $this;
    }

    /**
     * The ID of the service this task is part of.
     */
    public function getServiceID(): string
    {
        return $this->serviceID;
    }

    /**
     * The ID of the service this task is part of.
     */
    public function setServiceID(string $serviceID): self
    {
        $this->initialized['serviceID'] = true;
        $this->serviceID = $serviceID;

        return $this;
    }

    public function getSlot(): int
    {
        return $this->slot;
    }

    public function setSlot(int $slot): self
    {
        $this->initialized['slot'] = true;
        $this->slot = $slot;

        return $this;
    }

    /**
     * The ID of the node that this task is on.
     */
    public function getNodeID(): string
    {
        return $this->nodeID;
    }

    /**
     * The ID of the node that this task is on.
     */
    public function setNodeID(string $nodeID): self
    {
        $this->initialized['nodeID'] = true;
        $this->nodeID = $nodeID;

        return $this;
    }

    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @return list<GenericResourcesItem>
     */
    public function getAssignedGenericResources(): array
    {
        return $this->assignedGenericResources;
    }

    /**
     * User-defined resources can be either Integer resources (e.g, `SSD=3`) or
     * String resources (e.g, `GPU=UUID1`).
     *
     * @param list<GenericResourcesItem> $assignedGenericResources
     */
    public function setAssignedGenericResources(array $assignedGenericResources): self
    {
        $this->initialized['assignedGenericResources'] = true;
        $this->assignedGenericResources = $assignedGenericResources;

        return $this;
    }

    /**
     * represents the status of a task.
     */
    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    /**
     * represents the status of a task.
     */
    public function setStatus(TaskStatus $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function getDesiredState(): string
    {
        return $this->desiredState;
    }

    public function setDesiredState(string $desiredState): self
    {
        $this->initialized['desiredState'] = true;
        $this->desiredState = $desiredState;

        return $this;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     */
    public function getJobIteration(): ObjectVersion
    {
        return $this->jobIteration;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     */
    public function setJobIteration(ObjectVersion $jobIteration): self
    {
        $this->initialized['jobIteration'] = true;
        $this->jobIteration = $jobIteration;

        return $this;
    }
}
