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

final class TaskSpecPlacementPreferencesItemSpread
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
     * label descriptor, such as `engine.labels.az`.
     *
     * @var string
     */
    private $spreadDescriptor;

    /**
     * label descriptor, such as `engine.labels.az`.
     */
    public function getSpreadDescriptor(): string
    {
        return $this->spreadDescriptor;
    }

    /**
     * label descriptor, such as `engine.labels.az`.
     */
    public function setSpreadDescriptor(string $spreadDescriptor): self
    {
        $this->initialized['spreadDescriptor'] = true;
        $this->spreadDescriptor = $spreadDescriptor;

        return $this;
    }
}
