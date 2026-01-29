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

final class ContainerTopResponse
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
     * The ps column titles.
     *
     * @var list<string>
     */
    private $titles;
    /**
     * Each process running in the container, where each process
     * is an array of values corresponding to the titles.
     *
     * @var list<list<string>>
     */
    private $processes;

    /**
     * The ps column titles.
     *
     * @return list<string>
     */
    public function getTitles(): array
    {
        return $this->titles;
    }

    /**
     * The ps column titles.
     *
     * @param list<string> $titles
     */
    public function setTitles(array $titles): self
    {
        $this->initialized['titles'] = true;
        $this->titles = $titles;

        return $this;
    }

    /**
     * Each process running in the container, where each process
     * is an array of values corresponding to the titles.
     *
     * @return list<list<string>>
     */
    public function getProcesses(): array
    {
        return $this->processes;
    }

    /**
     * Each process running in the container, where each process
     * is an array of values corresponding to the titles.
     *
     * @param list<list<string>> $processes
     */
    public function setProcesses(array $processes): self
    {
        $this->initialized['processes'] = true;
        $this->processes = $processes;

        return $this;
    }
}
