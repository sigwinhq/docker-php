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

final class ImageDeleteResponseItem
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
     * The image ID of an image that was untagged.
     *
     * @var string
     */
    private $untagged;
    /**
     * The image ID of an image that was deleted.
     *
     * @var string
     */
    private $deleted;

    /**
     * The image ID of an image that was untagged.
     */
    public function getUntagged(): string
    {
        return $this->untagged;
    }

    /**
     * The image ID of an image that was untagged.
     */
    public function setUntagged(string $untagged): self
    {
        $this->initialized['untagged'] = true;
        $this->untagged = $untagged;

        return $this;
    }

    /**
     * The image ID of an image that was deleted.
     */
    public function getDeleted(): string
    {
        return $this->deleted;
    }

    /**
     * The image ID of an image that was deleted.
     */
    public function setDeleted(string $deleted): self
    {
        $this->initialized['deleted'] = true;
        $this->deleted = $deleted;

        return $this;
    }
}
