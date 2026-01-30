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

final class VolumeListResponse
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
     * List of volumes.
     *
     * @var list<Volume>
     */
    private $volumes;
    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @var list<string>
     */
    private $warnings;

    /**
     * List of volumes.
     *
     * @return list<Volume>
     */
    public function getVolumes(): array
    {
        return $this->volumes;
    }

    /**
     * List of volumes.
     *
     * @param list<Volume> $volumes
     */
    public function setVolumes(array $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;

        return $this;
    }

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @return list<string>
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @param list<string> $warnings
     */
    public function setWarnings(array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }
}
