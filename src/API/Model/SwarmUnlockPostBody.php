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

final class SwarmUnlockPostBody
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
     * The swarm's unlock key.
     *
     * @var string
     */
    private $unlockKey;

    /**
     * The swarm's unlock key.
     */
    public function getUnlockKey(): string
    {
        return $this->unlockKey;
    }

    /**
     * The swarm's unlock key.
     */
    public function setUnlockKey(string $unlockKey): self
    {
        $this->initialized['unlockKey'] = true;
        $this->unlockKey = $unlockKey;

        return $this;
    }
}
