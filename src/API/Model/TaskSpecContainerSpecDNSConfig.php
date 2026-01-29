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

final class TaskSpecContainerSpecDNSConfig
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
     * The IP addresses of the name servers.
     *
     * @var list<string>
     */
    private $nameservers;
    /**
     * A search list for host-name lookup.
     *
     * @var list<string>
     */
    private $search;
    /**
     * A list of internal resolver variables to be modified (e.g.,
     * `debug`, `ndots:3`, etc.).
     *
     * @var list<string>
     */
    private $options;

    /**
     * The IP addresses of the name servers.
     *
     * @return list<string>
     */
    public function getNameservers(): array
    {
        return $this->nameservers;
    }

    /**
     * The IP addresses of the name servers.
     *
     * @param list<string> $nameservers
     */
    public function setNameservers(array $nameservers): self
    {
        $this->initialized['nameservers'] = true;
        $this->nameservers = $nameservers;

        return $this;
    }

    /**
     * A search list for host-name lookup.
     *
     * @return list<string>
     */
    public function getSearch(): array
    {
        return $this->search;
    }

    /**
     * A search list for host-name lookup.
     *
     * @param list<string> $search
     */
    public function setSearch(array $search): self
    {
        $this->initialized['search'] = true;
        $this->search = $search;

        return $this;
    }

    /**
     * A list of internal resolver variables to be modified (e.g.,
     * `debug`, `ndots:3`, etc.).
     *
     * @return list<string>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * A list of internal resolver variables to be modified (e.g.,
     * `debug`, `ndots:3`, etc.).
     *
     * @param list<string> $options
     */
    public function setOptions(array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }
}
