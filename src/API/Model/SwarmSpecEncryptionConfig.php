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

final class SwarmSpecEncryptionConfig
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
     * If set, generate a key and use it to lock data stored on the
     * managers.
     *
     * @var bool
     */
    private $autoLockManagers;

    /**
     * If set, generate a key and use it to lock data stored on the
     * managers.
     */
    public function getAutoLockManagers(): bool
    {
        return $this->autoLockManagers;
    }

    /**
     * If set, generate a key and use it to lock data stored on the
     * managers.
     */
    public function setAutoLockManagers(bool $autoLockManagers): self
    {
        $this->initialized['autoLockManagers'] = true;
        $this->autoLockManagers = $autoLockManagers;

        return $this;
    }
}
