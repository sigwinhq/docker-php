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

final class TaskSpecContainerSpecPrivilegesCredentialSpec
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
     * Load credential spec from a Swarm Config with the given ID.
     * The specified config must also be present in the Configs
     * field with the Runtime property set.
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     *
     * @var string
     */
    private $config;
    /**
     * Load credential spec from this file. The file is read by
     * the daemon, and must be present in the `CredentialSpecs`
     * subdirectory in the docker data directory, which defaults
     * to `C:\ProgramData\Docker\` on Windows.
     *
     * For example, specifying `spec.json` loads
     * `C:\ProgramData\Docker\CredentialSpecs\spec.json`.
     *
     * <p><br /></p>
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     *
     * @var string
     */
    private $file;
    /**
     * Load credential spec from this value in the Windows
     * registry. The specified registry value must be located in:
     *
     * `HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Virtualization\Containers\CredentialSpecs`
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     *
     * @var string
     */
    private $registry;

    /**
     * Load credential spec from a Swarm Config with the given ID.
     * The specified config must also be present in the Configs
     * field with the Runtime property set.
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function getConfig(): string
    {
        return $this->config;
    }

    /**
     * Load credential spec from a Swarm Config with the given ID.
     * The specified config must also be present in the Configs
     * field with the Runtime property set.
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function setConfig(string $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;

        return $this;
    }

    /**
     * Load credential spec from this file. The file is read by
     * the daemon, and must be present in the `CredentialSpecs`
     * subdirectory in the docker data directory, which defaults
     * to `C:\ProgramData\Docker\` on Windows.
     *
     * For example, specifying `spec.json` loads
     * `C:\ProgramData\Docker\CredentialSpecs\spec.json`.
     *
     * <p><br /></p>
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * Load credential spec from this file. The file is read by
     * the daemon, and must be present in the `CredentialSpecs`
     * subdirectory in the docker data directory, which defaults
     * to `C:\ProgramData\Docker\` on Windows.
     *
     * For example, specifying `spec.json` loads
     * `C:\ProgramData\Docker\CredentialSpecs\spec.json`.
     *
     * <p><br /></p>
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function setFile(string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * Load credential spec from this value in the Windows
     * registry. The specified registry value must be located in:
     *
     * `HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Virtualization\Containers\CredentialSpecs`
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function getRegistry(): string
    {
        return $this->registry;
    }

    /**
     * Load credential spec from this value in the Windows
     * registry. The specified registry value must be located in:
     *
     * `HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Virtualization\Containers\CredentialSpecs`
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File`, `CredentialSpec.Registry`,
     * > and `CredentialSpec.Config` are mutually exclusive.
     */
    public function setRegistry(string $registry): self
    {
        $this->initialized['registry'] = true;
        $this->registry = $registry;

        return $this;
    }
}
