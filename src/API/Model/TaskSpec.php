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

final class TaskSpec
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
     * Plugin spec for the service.  *(Experimental release only.)*.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     *
     * @var TaskSpecPluginSpec
     */
    private $pluginSpec;
    /**
     * Container spec for the service.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     *
     * @var TaskSpecContainerSpec
     */
    private $containerSpec;
    /**
     * Read-only spec type for non-swarm containers attached to swarm overlay
     * networks.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     *
     * @var TaskSpecNetworkAttachmentSpec
     */
    private $networkAttachmentSpec;
    /**
     * Resource requirements which apply to each individual container created
     * as part of the service.
     *
     * @var TaskSpecResources
     */
    private $resources;
    /**
     * Specification for the restart policy which applies to containers
     * created as part of this service.
     *
     * @var TaskSpecRestartPolicy
     */
    private $restartPolicy;
    /**
     * @var TaskSpecPlacement
     */
    private $placement;
    /**
     * A counter that triggers an update even if no relevant parameters have
     * been changed.
     *
     * @var int
     */
    private $forceUpdate;
    /**
     * Runtime is the type of runtime specified for the task executor.
     *
     * @var string
     */
    private $runtime;
    /**
     * Specifies which networks the service should attach to.
     *
     * @var list<NetworkAttachmentConfig>
     */
    private $networks;
    /**
     * Specifies the log driver to use for tasks created from this spec. If
     * not present, the default one for the swarm will be used, finally
     * falling back to the engine default if not specified.
     *
     * @var TaskSpecLogDriver
     */
    private $logDriver;

    /**
     * Plugin spec for the service.  *(Experimental release only.)*.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     */
    public function getPluginSpec(): TaskSpecPluginSpec
    {
        return $this->pluginSpec;
    }

    /**
     * Plugin spec for the service.  *(Experimental release only.)*.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     */
    public function setPluginSpec(TaskSpecPluginSpec $pluginSpec): self
    {
        $this->initialized['pluginSpec'] = true;
        $this->pluginSpec = $pluginSpec;

        return $this;
    }

    /**
     * Container spec for the service.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     */
    public function getContainerSpec(): TaskSpecContainerSpec
    {
        return $this->containerSpec;
    }

    /**
     * Container spec for the service.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     */
    public function setContainerSpec(TaskSpecContainerSpec $containerSpec): self
    {
        $this->initialized['containerSpec'] = true;
        $this->containerSpec = $containerSpec;

        return $this;
    }

    /**
     * Read-only spec type for non-swarm containers attached to swarm overlay
     * networks.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     */
    public function getNetworkAttachmentSpec(): TaskSpecNetworkAttachmentSpec
    {
        return $this->networkAttachmentSpec;
    }

    /**
     * Read-only spec type for non-swarm containers attached to swarm overlay
     * networks.
     *
     * <p><br /></p>
     *
     * > **Note**: ContainerSpec, NetworkAttachmentSpec, and PluginSpec are
     * > mutually exclusive. PluginSpec is only used when the Runtime field
     * > is set to `plugin`. NetworkAttachmentSpec is used when the Runtime
     * > field is set to `attachment`.
     */
    public function setNetworkAttachmentSpec(TaskSpecNetworkAttachmentSpec $networkAttachmentSpec): self
    {
        $this->initialized['networkAttachmentSpec'] = true;
        $this->networkAttachmentSpec = $networkAttachmentSpec;

        return $this;
    }

    /**
     * Resource requirements which apply to each individual container created
     * as part of the service.
     */
    public function getResources(): TaskSpecResources
    {
        return $this->resources;
    }

    /**
     * Resource requirements which apply to each individual container created
     * as part of the service.
     */
    public function setResources(TaskSpecResources $resources): self
    {
        $this->initialized['resources'] = true;
        $this->resources = $resources;

        return $this;
    }

    /**
     * Specification for the restart policy which applies to containers
     * created as part of this service.
     */
    public function getRestartPolicy(): TaskSpecRestartPolicy
    {
        return $this->restartPolicy;
    }

    /**
     * Specification for the restart policy which applies to containers
     * created as part of this service.
     */
    public function setRestartPolicy(TaskSpecRestartPolicy $restartPolicy): self
    {
        $this->initialized['restartPolicy'] = true;
        $this->restartPolicy = $restartPolicy;

        return $this;
    }

    public function getPlacement(): TaskSpecPlacement
    {
        return $this->placement;
    }

    public function setPlacement(TaskSpecPlacement $placement): self
    {
        $this->initialized['placement'] = true;
        $this->placement = $placement;

        return $this;
    }

    /**
     * A counter that triggers an update even if no relevant parameters have
     * been changed.
     */
    public function getForceUpdate(): int
    {
        return $this->forceUpdate;
    }

    /**
     * A counter that triggers an update even if no relevant parameters have
     * been changed.
     */
    public function setForceUpdate(int $forceUpdate): self
    {
        $this->initialized['forceUpdate'] = true;
        $this->forceUpdate = $forceUpdate;

        return $this;
    }

    /**
     * Runtime is the type of runtime specified for the task executor.
     */
    public function getRuntime(): string
    {
        return $this->runtime;
    }

    /**
     * Runtime is the type of runtime specified for the task executor.
     */
    public function setRuntime(string $runtime): self
    {
        $this->initialized['runtime'] = true;
        $this->runtime = $runtime;

        return $this;
    }

    /**
     * Specifies which networks the service should attach to.
     *
     * @return list<NetworkAttachmentConfig>
     */
    public function getNetworks(): array
    {
        return $this->networks;
    }

    /**
     * Specifies which networks the service should attach to.
     *
     * @param list<NetworkAttachmentConfig> $networks
     */
    public function setNetworks(array $networks): self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;

        return $this;
    }

    /**
     * Specifies the log driver to use for tasks created from this spec. If
     * not present, the default one for the swarm will be used, finally
     * falling back to the engine default if not specified.
     */
    public function getLogDriver(): TaskSpecLogDriver
    {
        return $this->logDriver;
    }

    /**
     * Specifies the log driver to use for tasks created from this spec. If
     * not present, the default one for the swarm will be used, finally
     * falling back to the engine default if not specified.
     */
    public function setLogDriver(TaskSpecLogDriver $logDriver): self
    {
        $this->initialized['logDriver'] = true;
        $this->logDriver = $logDriver;

        return $this;
    }
}
