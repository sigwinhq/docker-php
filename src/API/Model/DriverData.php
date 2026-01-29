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

final class DriverData
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
     * Name of the storage driver.
     *
     * @var string
     */
    private $name;
    /**
     * Low-level storage metadata, provided as key/value pairs.
     *
     * This information is driver-specific, and depends on the storage-driver
     * in use, and should be used for informational purposes only.
     *
     * @var array<string, string>
     */
    private $data;

    /**
     * Name of the storage driver.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the storage driver.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Low-level storage metadata, provided as key/value pairs.
     *
     * This information is driver-specific, and depends on the storage-driver
     * in use, and should be used for informational purposes only.
     *
     * @return array<string, string>
     */
    public function getData(): iterable
    {
        return $this->data;
    }

    /**
     * Low-level storage metadata, provided as key/value pairs.
     *
     * This information is driver-specific, and depends on the storage-driver
     * in use, and should be used for informational purposes only.
     *
     * @param array<string, string> $data
     */
    public function setData(iterable $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }
}
