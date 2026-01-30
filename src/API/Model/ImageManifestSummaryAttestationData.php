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

final class ImageManifestSummaryAttestationData
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
     * The digest of the image manifest that this attestation is for.
     *
     * @var string
     */
    private $for;

    /**
     * The digest of the image manifest that this attestation is for.
     */
    public function getFor(): string
    {
        return $this->for;
    }

    /**
     * The digest of the image manifest that this attestation is for.
     */
    public function setFor(string $for): self
    {
        $this->initialized['for'] = true;
        $this->for = $for;

        return $this;
    }
}
