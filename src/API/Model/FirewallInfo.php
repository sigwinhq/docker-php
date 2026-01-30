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

final class FirewallInfo
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
     * The name of the firewall backend driver.
     *
     * @var string
     */
    private $driver;
    /**
     * Information about the firewall backend, provided as
     * "label" / "value" pairs.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @var list<list<string>>
     */
    private $info;

    /**
     * The name of the firewall backend driver.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * The name of the firewall backend driver.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;

        return $this;
    }

    /**
     * Information about the firewall backend, provided as
     * "label" / "value" pairs.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @return list<list<string>>
     */
    public function getInfo(): array
    {
        return $this->info;
    }

    /**
     * Information about the firewall backend, provided as
     * "label" / "value" pairs.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @param list<list<string>> $info
     */
    public function setInfo(array $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }
}
