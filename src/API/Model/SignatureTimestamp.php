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

final class SignatureTimestamp
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
     * SignatureTimestampType is the type of timestamp used in the signature.
     *
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $uRI;
    /**
     * @var \DateTime
     */
    private $timestamp;

    /**
     * SignatureTimestampType is the type of timestamp used in the signature.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * SignatureTimestampType is the type of timestamp used in the signature.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function getURI(): string
    {
        return $this->uRI;
    }

    public function setURI(string $uRI): self
    {
        $this->initialized['uRI'] = true;
        $this->uRI = $uRI;

        return $this;
    }

    public function getTimestamp(): \DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeImmutable $timestamp): self
    {
        $this->initialized['timestamp'] = true;
        $this->timestamp = $timestamp;

        return $this;
    }
}
