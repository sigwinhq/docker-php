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

final class PluginConfig
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
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $documentation;
    /**
     * The interface between Docker and the plugin.
     *
     * @var PluginConfigInterface
     */
    private $interface;
    /**
     * @var list<string>
     */
    private $entrypoint;
    /**
     * @var string
     */
    private $workDir;
    /**
     * @var PluginConfigUser
     */
    private $user;
    /**
     * @var PluginConfigNetwork
     */
    private $network;
    /**
     * @var PluginConfigLinux
     */
    private $linux;
    /**
     * @var string
     */
    private $propagatedMount;
    /**
     * @var bool
     */
    private $ipcHost;
    /**
     * @var bool
     */
    private $pidHost;
    /**
     * @var list<PluginMount>
     */
    private $mounts;
    /**
     * @var list<PluginEnv>
     */
    private $env;
    /**
     * @var PluginConfigArgs
     */
    private $args;
    /**
     * @var PluginConfigRootfs
     */
    private $rootfs;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    public function getDocumentation(): string
    {
        return $this->documentation;
    }

    public function setDocumentation(string $documentation): self
    {
        $this->initialized['documentation'] = true;
        $this->documentation = $documentation;

        return $this;
    }

    /**
     * The interface between Docker and the plugin.
     */
    public function getInterface(): PluginConfigInterface
    {
        return $this->interface;
    }

    /**
     * The interface between Docker and the plugin.
     */
    public function setInterface(PluginConfigInterface $interface): self
    {
        $this->initialized['interface'] = true;
        $this->interface = $interface;

        return $this;
    }

    /**
     * @return list<string>
     */
    public function getEntrypoint(): array
    {
        return $this->entrypoint;
    }

    /**
     * @param list<string> $entrypoint
     */
    public function setEntrypoint(array $entrypoint): self
    {
        $this->initialized['entrypoint'] = true;
        $this->entrypoint = $entrypoint;

        return $this;
    }

    public function getWorkDir(): string
    {
        return $this->workDir;
    }

    public function setWorkDir(string $workDir): self
    {
        $this->initialized['workDir'] = true;
        $this->workDir = $workDir;

        return $this;
    }

    public function getUser(): PluginConfigUser
    {
        return $this->user;
    }

    public function setUser(PluginConfigUser $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;

        return $this;
    }

    public function getNetwork(): PluginConfigNetwork
    {
        return $this->network;
    }

    public function setNetwork(PluginConfigNetwork $network): self
    {
        $this->initialized['network'] = true;
        $this->network = $network;

        return $this;
    }

    public function getLinux(): PluginConfigLinux
    {
        return $this->linux;
    }

    public function setLinux(PluginConfigLinux $linux): self
    {
        $this->initialized['linux'] = true;
        $this->linux = $linux;

        return $this;
    }

    public function getPropagatedMount(): string
    {
        return $this->propagatedMount;
    }

    public function setPropagatedMount(string $propagatedMount): self
    {
        $this->initialized['propagatedMount'] = true;
        $this->propagatedMount = $propagatedMount;

        return $this;
    }

    public function getIpcHost(): bool
    {
        return $this->ipcHost;
    }

    public function setIpcHost(bool $ipcHost): self
    {
        $this->initialized['ipcHost'] = true;
        $this->ipcHost = $ipcHost;

        return $this;
    }

    public function getPidHost(): bool
    {
        return $this->pidHost;
    }

    public function setPidHost(bool $pidHost): self
    {
        $this->initialized['pidHost'] = true;
        $this->pidHost = $pidHost;

        return $this;
    }

    /**
     * @return list<PluginMount>
     */
    public function getMounts(): array
    {
        return $this->mounts;
    }

    /**
     * @param list<PluginMount> $mounts
     */
    public function setMounts(array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;

        return $this;
    }

    /**
     * @return list<PluginEnv>
     */
    public function getEnv(): array
    {
        return $this->env;
    }

    /**
     * @param list<PluginEnv> $env
     */
    public function setEnv(array $env): self
    {
        $this->initialized['env'] = true;
        $this->env = $env;

        return $this;
    }

    public function getArgs(): PluginConfigArgs
    {
        return $this->args;
    }

    public function setArgs(PluginConfigArgs $args): self
    {
        $this->initialized['args'] = true;
        $this->args = $args;

        return $this;
    }

    public function getRootfs(): PluginConfigRootfs
    {
        return $this->rootfs;
    }

    public function setRootfs(PluginConfigRootfs $rootfs): self
    {
        $this->initialized['rootfs'] = true;
        $this->rootfs = $rootfs;

        return $this;
    }
}
