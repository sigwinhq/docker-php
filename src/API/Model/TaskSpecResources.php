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

final class TaskSpecResources
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
     * An object describing a limit on resources which can be requested by a task.
     *
     * @var Limit
     */
    private $limits;
    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     *
     * @var ResourceObject
     */
    private $reservations;
    /**
     * Amount of swap in bytes - can only be used together with a memory limit.
     * If not specified, the default behaviour is to grant a swap space twice
     * as big as the memory limit.
     * Set to -1 to enable unlimited swap.
     *
     * @var null|int
     */
    private $swapBytes;
    /**
     * Tune the service's containers' memory swappiness (0 to 100).
     * If not specified, defaults to the containers' OS' default, generally 60,
     * or whatever value was predefined in the image.
     * Set to -1 to unset a previously set value.
     *
     * @var null|int
     */
    private $memorySwappiness;

    /**
     * An object describing a limit on resources which can be requested by a task.
     */
    public function getLimits(): Limit
    {
        return $this->limits;
    }

    /**
     * An object describing a limit on resources which can be requested by a task.
     */
    public function setLimits(Limit $limits): self
    {
        $this->initialized['limits'] = true;
        $this->limits = $limits;

        return $this;
    }

    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     */
    public function getReservations(): ResourceObject
    {
        return $this->reservations;
    }

    /**
     * An object describing the resources which can be advertised by a node and
     * requested by a task.
     */
    public function setReservations(ResourceObject $reservations): self
    {
        $this->initialized['reservations'] = true;
        $this->reservations = $reservations;

        return $this;
    }

    /**
     * Amount of swap in bytes - can only be used together with a memory limit.
     * If not specified, the default behaviour is to grant a swap space twice
     * as big as the memory limit.
     * Set to -1 to enable unlimited swap.
     */
    public function getSwapBytes(): ?int
    {
        return $this->swapBytes;
    }

    /**
     * Amount of swap in bytes - can only be used together with a memory limit.
     * If not specified, the default behaviour is to grant a swap space twice
     * as big as the memory limit.
     * Set to -1 to enable unlimited swap.
     */
    public function setSwapBytes(?int $swapBytes): self
    {
        $this->initialized['swapBytes'] = true;
        $this->swapBytes = $swapBytes;

        return $this;
    }

    /**
     * Tune the service's containers' memory swappiness (0 to 100).
     * If not specified, defaults to the containers' OS' default, generally 60,
     * or whatever value was predefined in the image.
     * Set to -1 to unset a previously set value.
     */
    public function getMemorySwappiness(): ?int
    {
        return $this->memorySwappiness;
    }

    /**
     * Tune the service's containers' memory swappiness (0 to 100).
     * If not specified, defaults to the containers' OS' default, generally 60,
     * or whatever value was predefined in the image.
     * Set to -1 to unset a previously set value.
     */
    public function setMemorySwappiness(?int $memorySwappiness): self
    {
        $this->initialized['memorySwappiness'] = true;
        $this->memorySwappiness = $memorySwappiness;

        return $this;
    }
}
