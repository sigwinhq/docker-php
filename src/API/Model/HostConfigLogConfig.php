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

final class HostConfigLogConfig
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
     * Name of the logging driver used for the container or "none"
     * if logging is disabled.
     *
     * @var string
     */
    private $type;
    /**
     * Driver-specific configuration options for the logging driver.
     *
     * @var array<string, string>
     */
    private $config;

    /**
     * Name of the logging driver used for the container or "none"
     * if logging is disabled.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Name of the logging driver used for the container or "none"
     * if logging is disabled.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Driver-specific configuration options for the logging driver.
     *
     * @return array<string, string>
     */
    public function getConfig(): iterable
    {
        return $this->config;
    }

    /**
     * Driver-specific configuration options for the logging driver.
     *
     * @param array<string, string> $config
     */
    public function setConfig(iterable $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }
}
