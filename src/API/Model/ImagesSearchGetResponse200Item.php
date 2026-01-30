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

final class ImagesSearchGetResponse200Item
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
     * @var string
     */
    private $description;
    /**
     * @var bool
     */
    private $isOfficial;
    /**
     * Whether this repository has automated builds enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated and will always be "false".
     *
     * @var bool
     */
    private $isAutomated;
    /**
     * @var string
     */
    private $name;
    /**
     * @var int
     */
    private $starCount;

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    public function getIsOfficial(): bool
    {
        return $this->isOfficial;
    }

    public function setIsOfficial(bool $isOfficial): self
    {
        $this->initialized['isOfficial'] = true;
        $this->isOfficial = $isOfficial;

        return $this;
    }

    /**
     * Whether this repository has automated builds enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated and will always be "false".
     */
    public function getIsAutomated(): bool
    {
        return $this->isAutomated;
    }

    /**
     * Whether this repository has automated builds enabled.
     *
     * <p><br /></p>
     *
     * > **Deprecated**: This field is deprecated and will always be "false".
     */
    public function setIsAutomated(bool $isAutomated): self
    {
        $this->initialized['isAutomated'] = true;
        $this->isAutomated = $isAutomated;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getStarCount(): int
    {
        return $this->starCount;
    }

    public function setStarCount(int $starCount): self
    {
        $this->initialized['starCount'] = true;
        $this->starCount = $starCount;

        return $this;
    }
}
