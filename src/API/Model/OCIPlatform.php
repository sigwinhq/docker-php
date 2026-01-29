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

final class OCIPlatform
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
     * The CPU architecture, for example `amd64` or `ppc64`.
     *
     * @var string
     */
    private $architecture;
    /**
     * The operating system, for example `linux` or `windows`.
     *
     * @var string
     */
    private $os;
    /**
     * Optional field specifying the operating system version, for example on
     * Windows `10.0.19041.1165`.
     *
     * @var string
     */
    private $osVersion;
    /**
     * Optional field specifying an array of strings, each listing a required
     * OS feature (for example on Windows `win32k`).
     *
     * @var list<string>
     */
    private $osFeatures;
    /**
     * Optional field specifying a variant of the CPU, for example `v7` to
     * specify ARMv7 when architecture is `arm`.
     *
     * @var string
     */
    private $variant;

    /**
     * The CPU architecture, for example `amd64` or `ppc64`.
     */
    public function getArchitecture(): string
    {
        return $this->architecture;
    }

    /**
     * The CPU architecture, for example `amd64` or `ppc64`.
     */
    public function setArchitecture(string $architecture): self
    {
        $this->initialized['architecture'] = true;
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * The operating system, for example `linux` or `windows`.
     */
    public function getOs(): string
    {
        return $this->os;
    }

    /**
     * The operating system, for example `linux` or `windows`.
     */
    public function setOs(string $os): self
    {
        $this->initialized['os'] = true;
        $this->os = $os;

        return $this;
    }

    /**
     * Optional field specifying the operating system version, for example on
     * Windows `10.0.19041.1165`.
     */
    public function getOsVersion(): string
    {
        return $this->osVersion;
    }

    /**
     * Optional field specifying the operating system version, for example on
     * Windows `10.0.19041.1165`.
     */
    public function setOsVersion(string $osVersion): self
    {
        $this->initialized['osVersion'] = true;
        $this->osVersion = $osVersion;

        return $this;
    }

    /**
     * Optional field specifying an array of strings, each listing a required
     * OS feature (for example on Windows `win32k`).
     *
     * @return list<string>
     */
    public function getOsFeatures(): array
    {
        return $this->osFeatures;
    }

    /**
     * Optional field specifying an array of strings, each listing a required
     * OS feature (for example on Windows `win32k`).
     *
     * @param list<string> $osFeatures
     */
    public function setOsFeatures(array $osFeatures): self
    {
        $this->initialized['osFeatures'] = true;
        $this->osFeatures = $osFeatures;

        return $this;
    }

    /**
     * Optional field specifying a variant of the CPU, for example `v7` to
     * specify ARMv7 when architecture is `arm`.
     */
    public function getVariant(): string
    {
        return $this->variant;
    }

    /**
     * Optional field specifying a variant of the CPU, for example `v7` to
     * specify ARMv7 when architecture is `arm`.
     */
    public function setVariant(string $variant): self
    {
        $this->initialized['variant'] = true;
        $this->variant = $variant;

        return $this;
    }
}
