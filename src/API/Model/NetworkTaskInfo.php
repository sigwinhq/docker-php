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

final class NetworkTaskInfo
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
    private $name;
    /**
     * @var string
     */
    private $endpointID;
    /**
     * @var string
     */
    private $endpointIP;
    /**
     * @var array<string, string>
     */
    private $info;

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

    public function getEndpointID(): string
    {
        return $this->endpointID;
    }

    public function setEndpointID(string $endpointID): self
    {
        $this->initialized['endpointID'] = true;
        $this->endpointID = $endpointID;

        return $this;
    }

    public function getEndpointIP(): string
    {
        return $this->endpointIP;
    }

    public function setEndpointIP(string $endpointIP): self
    {
        $this->initialized['endpointIP'] = true;
        $this->endpointIP = $endpointIP;

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getInfo(): iterable
    {
        return $this->info;
    }

    /**
     * @param array<string, string> $info
     */
    public function setInfo(iterable $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }
}
