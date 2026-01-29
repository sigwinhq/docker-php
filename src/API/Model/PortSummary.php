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

final class PortSummary
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
     * Host IP address that the container's port is mapped to.
     *
     * @var string
     */
    private $iP;
    /**
     * Port on the container.
     *
     * @var int
     */
    private $privatePort;
    /**
     * Port exposed on the host.
     *
     * @var int
     */
    private $publicPort;
    /**
     * @var string
     */
    private $type;

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function getIP(): string
    {
        return $this->iP;
    }

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function setIP(string $iP): self
    {
        $this->initialized['iP'] = true;
        $this->iP = $iP;

        return $this;
    }

    /**
     * Port on the container.
     */
    public function getPrivatePort(): int
    {
        return $this->privatePort;
    }

    /**
     * Port on the container.
     */
    public function setPrivatePort(int $privatePort): self
    {
        $this->initialized['privatePort'] = true;
        $this->privatePort = $privatePort;

        return $this;
    }

    /**
     * Port exposed on the host.
     */
    public function getPublicPort(): int
    {
        return $this->publicPort;
    }

    /**
     * Port exposed on the host.
     */
    public function setPublicPort(int $publicPort): self
    {
        $this->initialized['publicPort'] = true;
        $this->publicPort = $publicPort;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }
}
