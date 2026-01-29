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

final class TaskSpecPluginSpec
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
     * The name or 'alias' to use for the plugin.
     *
     * @var string
     */
    private $name;
    /**
     * The plugin image reference to use.
     *
     * @var string
     */
    private $remote;
    /**
     * Disable the plugin once scheduled.
     *
     * @var bool
     */
    private $disabled;
    /**
     * @var list<PluginPrivilege>
     */
    private $pluginPrivilege;

    /**
     * The name or 'alias' to use for the plugin.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The name or 'alias' to use for the plugin.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * The plugin image reference to use.
     */
    public function getRemote(): string
    {
        return $this->remote;
    }

    /**
     * The plugin image reference to use.
     */
    public function setRemote(string $remote): self
    {
        $this->initialized['remote'] = true;
        $this->remote = $remote;

        return $this;
    }

    /**
     * Disable the plugin once scheduled.
     */
    public function getDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * Disable the plugin once scheduled.
     */
    public function setDisabled(bool $disabled): self
    {
        $this->initialized['disabled'] = true;
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * @return list<PluginPrivilege>
     */
    public function getPluginPrivilege(): array
    {
        return $this->pluginPrivilege;
    }

    /**
     * @param list<PluginPrivilege> $pluginPrivilege
     */
    public function setPluginPrivilege(array $pluginPrivilege): self
    {
        $this->initialized['pluginPrivilege'] = true;
        $this->pluginPrivilege = $pluginPrivilege;

        return $this;
    }
}
