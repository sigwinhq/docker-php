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

final class EngineDescription
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
    private $engineVersion;
    /**
     * @var array<string, string>
     */
    private $labels;
    /**
     * @var list<EngineDescriptionPluginsItem>
     */
    private $plugins;

    public function getEngineVersion(): string
    {
        return $this->engineVersion;
    }

    public function setEngineVersion(string $engineVersion): self
    {
        $this->initialized['engineVersion'] = true;
        $this->engineVersion = $engineVersion;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * @return list<EngineDescriptionPluginsItem>
     */
    public function getPlugins(): array
    {
        return $this->plugins;
    }

    /**
     * @param list<EngineDescriptionPluginsItem> $plugins
     */
    public function setPlugins(array $plugins): self
    {
        $this->initialized['plugins'] = true;
        $this->plugins = $plugins;

        return $this;
    }
}
