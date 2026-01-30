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

final class ContainerSummaryHostConfig
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
     * Networking mode (`host`, `none`, `container:<id>`) or name of the
     * primary network the container is using.
     *
     * This field is primarily for backward compatibility. The container
     * can be connected to multiple networks for which information can be
     * found in the `NetworkSettings.Networks` field, which enumerates
     * settings per network.
     *
     * @var string
     */
    private $networkMode;
    /**
     * Arbitrary key-value metadata attached to the container.
     *
     * @var null|array<string, string>
     */
    private $annotations;

    /**
     * Networking mode (`host`, `none`, `container:<id>`) or name of the
     * primary network the container is using.
     *
     * This field is primarily for backward compatibility. The container
     * can be connected to multiple networks for which information can be
     * found in the `NetworkSettings.Networks` field, which enumerates
     * settings per network.
     */
    public function getNetworkMode(): string
    {
        return $this->networkMode;
    }

    /**
     * Networking mode (`host`, `none`, `container:<id>`) or name of the
     * primary network the container is using.
     *
     * This field is primarily for backward compatibility. The container
     * can be connected to multiple networks for which information can be
     * found in the `NetworkSettings.Networks` field, which enumerates
     * settings per network.
     */
    public function setNetworkMode(string $networkMode): self
    {
        $this->initialized['networkMode'] = true;
        $this->networkMode = $networkMode;

        return $this;
    }

    /**
     * Arbitrary key-value metadata attached to the container.
     *
     * @return null|array<string, string>
     */
    public function getAnnotations(): ?iterable
    {
        return $this->annotations;
    }

    /**
     * Arbitrary key-value metadata attached to the container.
     *
     * @param null|array<string, string> $annotations
     */
    public function setAnnotations(?iterable $annotations): self
    {
        $this->initialized['annotations'] = true;
        $this->annotations = $annotations;

        return $this;
    }
}
