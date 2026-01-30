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

final class ContainerdInfoNamespaces
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
     * The default containerd namespace used for containers managed
     * by the daemon.
     *
     * The default namespace for containers is "moby", but will be
     * suffixed with the `<uid>.<gid>` of the remapped `root` if
     * user-namespaces are enabled and the containerd image-store
     * is used.
     *
     * @var string
     */
    private $containers = 'moby';
    /**
     * The default containerd namespace used for plugins managed by
     * the daemon.
     *
     * The default namespace for plugins is "plugins.moby", but will be
     * suffixed with the `<uid>.<gid>` of the remapped `root` if
     * user-namespaces are enabled and the containerd image-store
     * is used.
     *
     * @var string
     */
    private $plugins = 'plugins.moby';

    /**
     * The default containerd namespace used for containers managed
     * by the daemon.
     *
     * The default namespace for containers is "moby", but will be
     * suffixed with the `<uid>.<gid>` of the remapped `root` if
     * user-namespaces are enabled and the containerd image-store
     * is used.
     */
    public function getContainers(): string
    {
        return $this->containers;
    }

    /**
     * The default containerd namespace used for containers managed
     * by the daemon.
     *
     * The default namespace for containers is "moby", but will be
     * suffixed with the `<uid>.<gid>` of the remapped `root` if
     * user-namespaces are enabled and the containerd image-store
     * is used.
     */
    public function setContainers(string $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;

        return $this;
    }

    /**
     * The default containerd namespace used for plugins managed by
     * the daemon.
     *
     * The default namespace for plugins is "plugins.moby", but will be
     * suffixed with the `<uid>.<gid>` of the remapped `root` if
     * user-namespaces are enabled and the containerd image-store
     * is used.
     */
    public function getPlugins(): string
    {
        return $this->plugins;
    }

    /**
     * The default containerd namespace used for plugins managed by
     * the daemon.
     *
     * The default namespace for plugins is "plugins.moby", but will be
     * suffixed with the `<uid>.<gid>` of the remapped `root` if
     * user-namespaces are enabled and the containerd image-store
     * is used.
     */
    public function setPlugins(string $plugins): self
    {
        $this->initialized['plugins'] = true;
        $this->plugins = $plugins;

        return $this;
    }
}
