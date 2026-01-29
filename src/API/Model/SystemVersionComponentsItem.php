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

final class SystemVersionComponentsItem
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
     * Name of the component.
     *
     * @var string
     */
    private $name;
    /**
     * Version of the component.
     *
     * @var string
     */
    private $version;
    /**
     * Key/value pairs of strings with additional information about the
     * component. These values are intended for informational purposes
     * only, and their content is not defined, and not part of the API
     * specification.
     *
     * These messages can be printed by the client as information to the user.
     *
     * @var null|mixed
     */
    private $details;

    /**
     * Name of the component.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the component.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Version of the component.
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Version of the component.
     */
    public function setVersion(string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    /**
     * Key/value pairs of strings with additional information about the
     * component. These values are intended for informational purposes
     * only, and their content is not defined, and not part of the API
     * specification.
     *
     * These messages can be printed by the client as information to the user.
     */
    public function getDetails(): mixed
    {
        return $this->details;
    }

    /**
     * Key/value pairs of strings with additional information about the
     * component. These values are intended for informational purposes
     * only, and their content is not defined, and not part of the API
     * specification.
     *
     * These messages can be printed by the client as information to the user.
     */
    public function setDetails($details): self
    {
        $this->initialized['details'] = true;
        $this->details = $details;

        return $this;
    }
}
