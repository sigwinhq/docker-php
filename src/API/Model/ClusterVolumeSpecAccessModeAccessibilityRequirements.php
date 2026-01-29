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

final class ClusterVolumeSpecAccessModeAccessibilityRequirements
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
     * A list of required topologies, at least one of which the
     * volume must be accessible from.
     *
     * @var list<array<string, string>>
     */
    private $requisite;
    /**
     * A list of topologies that the volume should attempt to be
     * provisioned in.
     *
     * @var list<array<string, string>>
     */
    private $preferred;

    /**
     * A list of required topologies, at least one of which the
     * volume must be accessible from.
     *
     * @return list<array<string, string>>
     */
    public function getRequisite(): array
    {
        return $this->requisite;
    }

    /**
     * A list of required topologies, at least one of which the
     * volume must be accessible from.
     *
     * @param list<array<string, string>> $requisite
     */
    public function setRequisite(array $requisite): self
    {
        $this->initialized['requisite'] = true;
        $this->requisite = $requisite;

        return $this;
    }

    /**
     * A list of topologies that the volume should attempt to be
     * provisioned in.
     *
     * @return list<array<string, string>>
     */
    public function getPreferred(): array
    {
        return $this->preferred;
    }

    /**
     * A list of topologies that the volume should attempt to be
     * provisioned in.
     *
     * @param list<array<string, string>> $preferred
     */
    public function setPreferred(array $preferred): self
    {
        $this->initialized['preferred'] = true;
        $this->preferred = $preferred;

        return $this;
    }
}
