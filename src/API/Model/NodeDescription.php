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

final class NodeDescription
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
    private $hostname;
    /**
     * Platform represents the platform (Arch/OS).
     *
     * @var Platform
     */
    private $platform;
    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     *
     * @var ResourceObject
     */
    private $resources;
    /**
     * EngineDescription provides information about an engine.
     *
     * @var EngineDescription
     */
    private $engine;
    /**
     * Information about the issuer of leaf TLS certificates and the trusted root
     * CA certificate.
     *
     * @var TLSInfo
     */
    private $tLSInfo;

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function setHostname(string $hostname): self
    {
        $this->initialized['hostname'] = true;
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * Platform represents the platform (Arch/OS).
     */
    public function getPlatform(): Platform
    {
        return $this->platform;
    }

    /**
     * Platform represents the platform (Arch/OS).
     */
    public function setPlatform(Platform $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;

        return $this;
    }

    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     */
    public function getResources(): ResourceObject
    {
        return $this->resources;
    }

    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     */
    public function setResources(ResourceObject $resources): self
    {
        $this->initialized['resources'] = true;
        $this->resources = $resources;

        return $this;
    }

    /**
     * EngineDescription provides information about an engine.
     */
    public function getEngine(): EngineDescription
    {
        return $this->engine;
    }

    /**
     * EngineDescription provides information about an engine.
     */
    public function setEngine(EngineDescription $engine): self
    {
        $this->initialized['engine'] = true;
        $this->engine = $engine;

        return $this;
    }

    /**
     * Information about the issuer of leaf TLS certificates and the trusted root
     * CA certificate.
     */
    public function getTLSInfo(): TLSInfo
    {
        return $this->tLSInfo;
    }

    /**
     * Information about the issuer of leaf TLS certificates and the trusted root
     * CA certificate.
     */
    public function setTLSInfo(TLSInfo $tLSInfo): self
    {
        $this->initialized['tLSInfo'] = true;
        $this->tLSInfo = $tLSInfo;

        return $this;
    }
}
