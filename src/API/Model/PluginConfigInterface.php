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

final class PluginConfigInterface
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
     * @var list<string>
     */
    private $types;
    /**
     * @var string
     */
    private $socket;
    /**
     * Protocol to use for clients connecting to the plugin.
     *
     * @var string
     */
    private $protocolScheme;

    /**
     * @return list<string>
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param list<string> $types
     */
    public function setTypes(array $types): self
    {
        $this->initialized['types'] = true;
        $this->types = $types;

        return $this;
    }

    public function getSocket(): string
    {
        return $this->socket;
    }

    public function setSocket(string $socket): self
    {
        $this->initialized['socket'] = true;
        $this->socket = $socket;

        return $this;
    }

    /**
     * Protocol to use for clients connecting to the plugin.
     */
    public function getProtocolScheme(): string
    {
        return $this->protocolScheme;
    }

    /**
     * Protocol to use for clients connecting to the plugin.
     */
    public function setProtocolScheme(string $protocolScheme): self
    {
        $this->initialized['protocolScheme'] = true;
        $this->protocolScheme = $protocolScheme;

        return $this;
    }
}
