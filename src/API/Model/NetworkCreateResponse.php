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

final class NetworkCreateResponse
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
     * The ID of the created network.
     *
     * @var string
     */
    private $id;
    /**
     * Warnings encountered when creating the container.
     *
     * @var string
     */
    private $warning;

    /**
     * The ID of the created network.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the created network.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Warnings encountered when creating the container.
     */
    public function getWarning(): string
    {
        return $this->warning;
    }

    /**
     * Warnings encountered when creating the container.
     */
    public function setWarning(string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;

        return $this;
    }
}
