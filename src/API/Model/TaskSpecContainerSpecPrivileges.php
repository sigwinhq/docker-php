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

final class TaskSpecContainerSpecPrivileges
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
     * CredentialSpec for managed service account (Windows only).
     *
     * @var TaskSpecContainerSpecPrivilegesCredentialSpec
     */
    private $credentialSpec;
    /**
     * SELinux labels of the container.
     *
     * @var TaskSpecContainerSpecPrivilegesSELinuxContext
     */
    private $sELinuxContext;
    /**
     * Options for configuring seccomp on the container.
     *
     * @var TaskSpecContainerSpecPrivilegesSeccomp
     */
    private $seccomp;
    /**
     * Options for configuring AppArmor on the container.
     *
     * @var TaskSpecContainerSpecPrivilegesAppArmor
     */
    private $appArmor;
    /**
     * Configuration of the no_new_privs bit in the container.
     *
     * @var bool
     */
    private $noNewPrivileges;

    /**
     * CredentialSpec for managed service account (Windows only).
     */
    public function getCredentialSpec(): TaskSpecContainerSpecPrivilegesCredentialSpec
    {
        return $this->credentialSpec;
    }

    /**
     * CredentialSpec for managed service account (Windows only).
     */
    public function setCredentialSpec(TaskSpecContainerSpecPrivilegesCredentialSpec $credentialSpec): self
    {
        $this->initialized['credentialSpec'] = true;
        $this->credentialSpec = $credentialSpec;

        return $this;
    }

    /**
     * SELinux labels of the container.
     */
    public function getSELinuxContext(): TaskSpecContainerSpecPrivilegesSELinuxContext
    {
        return $this->sELinuxContext;
    }

    /**
     * SELinux labels of the container.
     */
    public function setSELinuxContext(TaskSpecContainerSpecPrivilegesSELinuxContext $sELinuxContext): self
    {
        $this->initialized['sELinuxContext'] = true;
        $this->sELinuxContext = $sELinuxContext;

        return $this;
    }

    /**
     * Options for configuring seccomp on the container.
     */
    public function getSeccomp(): TaskSpecContainerSpecPrivilegesSeccomp
    {
        return $this->seccomp;
    }

    /**
     * Options for configuring seccomp on the container.
     */
    public function setSeccomp(TaskSpecContainerSpecPrivilegesSeccomp $seccomp): self
    {
        $this->initialized['seccomp'] = true;
        $this->seccomp = $seccomp;

        return $this;
    }

    /**
     * Options for configuring AppArmor on the container.
     */
    public function getAppArmor(): TaskSpecContainerSpecPrivilegesAppArmor
    {
        return $this->appArmor;
    }

    /**
     * Options for configuring AppArmor on the container.
     */
    public function setAppArmor(TaskSpecContainerSpecPrivilegesAppArmor $appArmor): self
    {
        $this->initialized['appArmor'] = true;
        $this->appArmor = $appArmor;

        return $this;
    }

    /**
     * Configuration of the no_new_privs bit in the container.
     */
    public function getNoNewPrivileges(): bool
    {
        return $this->noNewPrivileges;
    }

    /**
     * Configuration of the no_new_privs bit in the container.
     */
    public function setNoNewPrivileges(bool $noNewPrivileges): self
    {
        $this->initialized['noNewPrivileges'] = true;
        $this->noNewPrivileges = $noNewPrivileges;

        return $this;
    }
}
