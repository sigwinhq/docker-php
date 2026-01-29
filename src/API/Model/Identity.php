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

final class Identity
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
     * Signature contains the properties of verified signatures for the image.
     *
     * @var list<SignatureIdentity>
     */
    private $signature;
    /**
     * Pull contains remote location information if image was created via pull.
     * If image was pulled via mirror, this contains the original repository location.
     * After successful push this images also contains the pushed repository location.
     *
     * @var list<PullIdentity>
     */
    private $pull;
    /**
     * Build contains build reference information if image was created via build.
     *
     * @var list<BuildIdentity>
     */
    private $build;

    /**
     * Signature contains the properties of verified signatures for the image.
     *
     * @return list<SignatureIdentity>
     */
    public function getSignature(): array
    {
        return $this->signature;
    }

    /**
     * Signature contains the properties of verified signatures for the image.
     *
     * @param list<SignatureIdentity> $signature
     */
    public function setSignature(array $signature): self
    {
        $this->initialized['signature'] = true;
        $this->signature = $signature;

        return $this;
    }

    /**
     * Pull contains remote location information if image was created via pull.
     * If image was pulled via mirror, this contains the original repository location.
     * After successful push this images also contains the pushed repository location.
     *
     * @return list<PullIdentity>
     */
    public function getPull(): array
    {
        return $this->pull;
    }

    /**
     * Pull contains remote location information if image was created via pull.
     * If image was pulled via mirror, this contains the original repository location.
     * After successful push this images also contains the pushed repository location.
     *
     * @param list<PullIdentity> $pull
     */
    public function setPull(array $pull): self
    {
        $this->initialized['pull'] = true;
        $this->pull = $pull;

        return $this;
    }

    /**
     * Build contains build reference information if image was created via build.
     *
     * @return list<BuildIdentity>
     */
    public function getBuild(): array
    {
        return $this->build;
    }

    /**
     * Build contains build reference information if image was created via build.
     *
     * @param list<BuildIdentity> $build
     */
    public function setBuild(array $build): self
    {
        $this->initialized['build'] = true;
        $this->build = $build;

        return $this;
    }
}
