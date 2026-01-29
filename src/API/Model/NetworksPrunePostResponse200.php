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

final class NetworksPrunePostResponse200
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
     * Networks that were deleted.
     *
     * @var list<string>
     */
    private $networksDeleted;

    /**
     * Networks that were deleted.
     *
     * @return list<string>
     */
    public function getNetworksDeleted(): array
    {
        return $this->networksDeleted;
    }

    /**
     * Networks that were deleted.
     *
     * @param list<string> $networksDeleted
     */
    public function setNetworksDeleted(array $networksDeleted): self
    {
        $this->initialized['networksDeleted'] = true;
        $this->networksDeleted = $networksDeleted;

        return $this;
    }
}
