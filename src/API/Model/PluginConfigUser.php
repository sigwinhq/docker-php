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

final class PluginConfigUser
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
     * @var int
     */
    private $uID;
    /**
     * @var int
     */
    private $gID;

    public function getUID(): int
    {
        return $this->uID;
    }

    public function setUID(int $uID): self
    {
        $this->initialized['uID'] = true;
        $this->uID = $uID;

        return $this;
    }

    public function getGID(): int
    {
        return $this->gID;
    }

    public function setGID(int $gID): self
    {
        $this->initialized['gID'] = true;
        $this->gID = $gID;

        return $this;
    }
}
