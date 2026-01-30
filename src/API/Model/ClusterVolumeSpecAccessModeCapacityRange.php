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

final class ClusterVolumeSpecAccessModeCapacityRange
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
     * The volume must be at least this big. The value of 0
     * indicates an unspecified minimum.
     *
     * @var int
     */
    private $requiredBytes;
    /**
     * The volume must not be bigger than this. The value of 0
     * indicates an unspecified maximum.
     *
     * @var int
     */
    private $limitBytes;

    /**
     * The volume must be at least this big. The value of 0
     * indicates an unspecified minimum.
     */
    public function getRequiredBytes(): int
    {
        return $this->requiredBytes;
    }

    /**
     * The volume must be at least this big. The value of 0
     * indicates an unspecified minimum.
     */
    public function setRequiredBytes(int $requiredBytes): self
    {
        $this->initialized['requiredBytes'] = true;
        $this->requiredBytes = $requiredBytes;

        return $this;
    }

    /**
     * The volume must not be bigger than this. The value of 0
     * indicates an unspecified maximum.
     */
    public function getLimitBytes(): int
    {
        return $this->limitBytes;
    }

    /**
     * The volume must not be bigger than this. The value of 0
     * indicates an unspecified maximum.
     */
    public function setLimitBytes(int $limitBytes): self
    {
        $this->initialized['limitBytes'] = true;
        $this->limitBytes = $limitBytes;

        return $this;
    }
}
