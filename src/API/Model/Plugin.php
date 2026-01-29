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

final class Plugin
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
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     *
     * @var bool
     */
    private $enabled;
    /**
     * user-configurable settings for the plugin.
     *
     * @var PluginSettings
     */
    private $settings;
    /**
     * plugin remote reference used to push/pull the plugin.
     *
     * @var string
     */
    private $pluginReference;
    /**
     * The config of a plugin.
     *
     * @var PluginConfig
     */
    private $config;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     */
    public function setEnabled(bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * user-configurable settings for the plugin.
     */
    public function getSettings(): PluginSettings
    {
        return $this->settings;
    }

    /**
     * user-configurable settings for the plugin.
     */
    public function setSettings(PluginSettings $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;

        return $this;
    }

    /**
     * plugin remote reference used to push/pull the plugin.
     */
    public function getPluginReference(): string
    {
        return $this->pluginReference;
    }

    /**
     * plugin remote reference used to push/pull the plugin.
     */
    public function setPluginReference(string $pluginReference): self
    {
        $this->initialized['pluginReference'] = true;
        $this->pluginReference = $pluginReference;

        return $this;
    }

    /**
     * The config of a plugin.
     */
    public function getConfig(): PluginConfig
    {
        return $this->config;
    }

    /**
     * The config of a plugin.
     */
    public function setConfig(PluginConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }
}
