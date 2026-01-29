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

final class GenericResourcesItem
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
     * @var GenericResourcesItemNamedResourceSpec
     */
    private $namedResourceSpec;
    /**
     * @var GenericResourcesItemDiscreteResourceSpec
     */
    private $discreteResourceSpec;

    public function getNamedResourceSpec(): GenericResourcesItemNamedResourceSpec
    {
        return $this->namedResourceSpec;
    }

    public function setNamedResourceSpec(GenericResourcesItemNamedResourceSpec $namedResourceSpec): self
    {
        $this->initialized['namedResourceSpec'] = true;
        $this->namedResourceSpec = $namedResourceSpec;

        return $this;
    }

    public function getDiscreteResourceSpec(): GenericResourcesItemDiscreteResourceSpec
    {
        return $this->discreteResourceSpec;
    }

    public function setDiscreteResourceSpec(GenericResourcesItemDiscreteResourceSpec $discreteResourceSpec): self
    {
        $this->initialized['discreteResourceSpec'] = true;
        $this->discreteResourceSpec = $discreteResourceSpec;

        return $this;
    }
}
