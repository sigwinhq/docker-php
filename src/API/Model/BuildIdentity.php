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

final class BuildIdentity
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
     * Ref is the identifier for the build request. This reference can be used to
     * look up the build details in BuildKit history API.
     *
     * @var string
     */
    private $ref;
    /**
     * CreatedAt is the time when the build ran.
     *
     * @var \DateTime
     */
    private $createdAt;

    /**
     * Ref is the identifier for the build request. This reference can be used to
     * look up the build details in BuildKit history API.
     */
    public function getRef(): string
    {
        return $this->ref;
    }

    /**
     * Ref is the identifier for the build request. This reference can be used to
     * look up the build details in BuildKit history API.
     */
    public function setRef(string $ref): self
    {
        $this->initialized['ref'] = true;
        $this->ref = $ref;

        return $this;
    }

    /**
     * CreatedAt is the time when the build ran.
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * CreatedAt is the time when the build ran.
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }
}
