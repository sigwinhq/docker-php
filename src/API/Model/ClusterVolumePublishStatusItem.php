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

final class ClusterVolumePublishStatusItem
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
     * The ID of the Swarm node the volume is published on.
     *
     * @var string
     */
    private $nodeID;
    /**
     * The published state of the volume.
     * * `pending-publish` The volume should be published to this node, but the call to the controller plugin to do so has not yet been successfully completed.
     * * `published` The volume is published successfully to the node.
     * * `pending-node-unpublish` The volume should be unpublished from the node, and the manager is awaiting confirmation from the worker that it has done so.
     * * `pending-controller-unpublish` The volume is successfully unpublished from the node, but has not yet been successfully unpublished on the controller.
     *
     * @var string
     */
    private $state;
    /**
     * A map of strings to strings returned by the CSI controller
     * plugin when a volume is published.
     *
     * @var array<string, string>
     */
    private $publishContext;

    /**
     * The ID of the Swarm node the volume is published on.
     */
    public function getNodeID(): string
    {
        return $this->nodeID;
    }

    /**
     * The ID of the Swarm node the volume is published on.
     */
    public function setNodeID(string $nodeID): self
    {
        $this->initialized['nodeID'] = true;
        $this->nodeID = $nodeID;

        return $this;
    }

    /**
     * The published state of the volume.
     * * `pending-publish` The volume should be published to this node, but the call to the controller plugin to do so has not yet been successfully completed.
     * * `published` The volume is published successfully to the node.
     * * `pending-node-unpublish` The volume should be unpublished from the node, and the manager is awaiting confirmation from the worker that it has done so.
     * * `pending-controller-unpublish` The volume is successfully unpublished from the node, but has not yet been successfully unpublished on the controller.
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * The published state of the volume.
     * `pending-publish` The volume should be published to this node, but the call to the controller plugin to do so has not yet been successfully completed.
     * `published` The volume is published successfully to the node.
     * `pending-node-unpublish` The volume should be unpublished from the node, and the manager is awaiting confirmation from the worker that it has done so.
     * `pending-controller-unpublish` The volume is successfully unpublished from the node, but has not yet been successfully unpublished on the controller.
     */
    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;

        return $this;
    }

    /**
     * A map of strings to strings returned by the CSI controller
     * plugin when a volume is published.
     *
     * @return array<string, string>
     */
    public function getPublishContext(): iterable
    {
        return $this->publishContext;
    }

    /**
     * A map of strings to strings returned by the CSI controller
     * plugin when a volume is published.
     *
     * @param array<string, string> $publishContext
     */
    public function setPublishContext(iterable $publishContext): self
    {
        $this->initialized['publishContext'] = true;
        $this->publishContext = $publishContext;

        return $this;
    }
}
