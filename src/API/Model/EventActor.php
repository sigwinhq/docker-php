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

final class EventActor
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
     * The ID of the object emitting the event.
     *
     * @var string
     */
    private $iD;
    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @var array<string, string>
     */
    private $attributes;

    /**
     * The ID of the object emitting the event.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the object emitting the event.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @return array<string, string>
     */
    public function getAttributes(): iterable
    {
        return $this->attributes;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @param array<string, string> $attributes
     */
    public function setAttributes(iterable $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;

        return $this;
    }
}
