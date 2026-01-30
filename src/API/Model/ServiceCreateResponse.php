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

final class ServiceCreateResponse
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
     * The ID of the created service.
     *
     * @var string
     */
    private $iD;
    /**
     * Optional warning message.
     *
     * FIXME(thaJeztah): this should have "omitempty" in the generated type.
     *
     * @var null|list<string>
     */
    private $warnings;

    /**
     * The ID of the created service.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the created service.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * Optional warning message.
     *
     * FIXME(thaJeztah): this should have "omitempty" in the generated type.
     *
     * @return null|list<string>
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * Optional warning message.
     *
     * FIXME(thaJeztah): this should have "omitempty" in the generated type.
     *
     * @param null|list<string> $warnings
     */
    public function setWarnings(?array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;

        return $this;
    }
}
