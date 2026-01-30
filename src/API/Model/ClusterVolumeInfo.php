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

final class ClusterVolumeInfo
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
     * The capacity of the volume in bytes. A value of 0 indicates that
     * the capacity is unknown.
     *
     * @var int
     */
    private $capacityBytes;
    /**
     * A map of strings to strings returned from the storage plugin when
     * the volume is created.
     *
     * @var array<string, string>
     */
    private $volumeContext;
    /**
     * The ID of the volume as returned by the CSI storage plugin. This
     * is distinct from the volume's ID as provided by Docker. This ID
     * is never used by the user when communicating with Docker to refer
     * to this volume. If the ID is blank, then the Volume has not been
     * successfully created in the plugin yet.
     *
     * @var string
     */
    private $volumeID;
    /**
     * The topology this volume is actually accessible from.
     *
     * @var list<array<string, string>>
     */
    private $accessibleTopology;

    /**
     * The capacity of the volume in bytes. A value of 0 indicates that
     * the capacity is unknown.
     */
    public function getCapacityBytes(): int
    {
        return $this->capacityBytes;
    }

    /**
     * The capacity of the volume in bytes. A value of 0 indicates that
     * the capacity is unknown.
     */
    public function setCapacityBytes(int $capacityBytes): self
    {
        $this->initialized['capacityBytes'] = true;
        $this->capacityBytes = $capacityBytes;

        return $this;
    }

    /**
     * A map of strings to strings returned from the storage plugin when
     * the volume is created.
     *
     * @return array<string, string>
     */
    public function getVolumeContext(): iterable
    {
        return $this->volumeContext;
    }

    /**
     * A map of strings to strings returned from the storage plugin when
     * the volume is created.
     *
     * @param array<string, string> $volumeContext
     */
    public function setVolumeContext(iterable $volumeContext): self
    {
        $this->initialized['volumeContext'] = true;
        $this->volumeContext = $volumeContext;

        return $this;
    }

    /**
     * The ID of the volume as returned by the CSI storage plugin. This
     * is distinct from the volume's ID as provided by Docker. This ID
     * is never used by the user when communicating with Docker to refer
     * to this volume. If the ID is blank, then the Volume has not been
     * successfully created in the plugin yet.
     */
    public function getVolumeID(): string
    {
        return $this->volumeID;
    }

    /**
     * The ID of the volume as returned by the CSI storage plugin. This
     * is distinct from the volume's ID as provided by Docker. This ID
     * is never used by the user when communicating with Docker to refer
     * to this volume. If the ID is blank, then the Volume has not been
     * successfully created in the plugin yet.
     */
    public function setVolumeID(string $volumeID): self
    {
        $this->initialized['volumeID'] = true;
        $this->volumeID = $volumeID;

        return $this;
    }

    /**
     * The topology this volume is actually accessible from.
     *
     * @return list<array<string, string>>
     */
    public function getAccessibleTopology(): array
    {
        return $this->accessibleTopology;
    }

    /**
     * The topology this volume is actually accessible from.
     *
     * @param list<array<string, string>> $accessibleTopology
     */
    public function setAccessibleTopology(array $accessibleTopology): self
    {
        $this->initialized['accessibleTopology'] = true;
        $this->accessibleTopology = $accessibleTopology;

        return $this;
    }
}
