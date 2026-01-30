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

final class ContainerStorageStats
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
     * @var null|int
     */
    private $readCountNormalized;
    /**
     * @var null|int
     */
    private $readSizeBytes;
    /**
     * @var null|int
     */
    private $writeCountNormalized;
    /**
     * @var null|int
     */
    private $writeSizeBytes;

    public function getReadCountNormalized(): ?int
    {
        return $this->readCountNormalized;
    }

    public function setReadCountNormalized(?int $readCountNormalized): self
    {
        $this->initialized['readCountNormalized'] = true;
        $this->readCountNormalized = $readCountNormalized;

        return $this;
    }

    public function getReadSizeBytes(): ?int
    {
        return $this->readSizeBytes;
    }

    public function setReadSizeBytes(?int $readSizeBytes): self
    {
        $this->initialized['readSizeBytes'] = true;
        $this->readSizeBytes = $readSizeBytes;

        return $this;
    }

    public function getWriteCountNormalized(): ?int
    {
        return $this->writeCountNormalized;
    }

    public function setWriteCountNormalized(?int $writeCountNormalized): self
    {
        $this->initialized['writeCountNormalized'] = true;
        $this->writeCountNormalized = $writeCountNormalized;

        return $this;
    }

    public function getWriteSizeBytes(): ?int
    {
        return $this->writeSizeBytes;
    }

    public function setWriteSizeBytes(?int $writeSizeBytes): self
    {
        $this->initialized['writeSizeBytes'] = true;
        $this->writeSizeBytes = $writeSizeBytes;

        return $this;
    }
}
