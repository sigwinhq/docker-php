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

final class NetworkDisconnectRequest
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
     * The ID or name of the container to disconnect from the network.
     *
     * @var string
     */
    private $container;
    /**
     * Force the container to disconnect from the network.
     *
     * @var bool
     */
    private $force = false;

    /**
     * The ID or name of the container to disconnect from the network.
     */
    public function getContainer(): string
    {
        return $this->container;
    }

    /**
     * The ID or name of the container to disconnect from the network.
     */
    public function setContainer(string $container): self
    {
        $this->initialized['container'] = true;
        $this->container = $container;

        return $this;
    }

    /**
     * Force the container to disconnect from the network.
     */
    public function getForce(): bool
    {
        return $this->force;
    }

    /**
     * Force the container to disconnect from the network.
     */
    public function setForce(bool $force): self
    {
        $this->initialized['force'] = true;
        $this->force = $force;

        return $this;
    }
}
