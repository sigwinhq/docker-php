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

final class ConfigSpec
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
     * User-defined name of the config.
     *
     * @var string
     */
    private $name;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    private $labels;
    /**
     * Data is the data to store as a config, formatted as a standard base64-encoded
     * ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-4)) string.
     * The maximum allowed size is 1000KB, as defined in [MaxConfigSize](https://pkg.go.dev/github.com/moby/swarmkit/v2@v2.0.0-20250103191802-8c1959736554/manager/controlapi#MaxConfigSize).
     *
     * @var string
     */
    private $data;
    /**
     * Driver represents a driver (network, logging, secrets).
     *
     * @var Driver
     */
    private $templating;

    /**
     * User-defined name of the config.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * User-defined name of the config.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;

        return $this;
    }

    /**
     * Data is the data to store as a config, formatted as a standard base64-encoded
     * ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-4)) string.
     * The maximum allowed size is 1000KB, as defined in [MaxConfigSize](https://pkg.go.dev/github.com/moby/swarmkit/v2@v2.0.0-20250103191802-8c1959736554/manager/controlapi#MaxConfigSize).
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * Data is the data to store as a config, formatted as a standard base64-encoded
     * ([RFC 4648](https://tools.ietf.org/html/rfc4648#section-4)) string.
     * The maximum allowed size is 1000KB, as defined in [MaxConfigSize](https://pkg.go.dev/github.com/moby/swarmkit/v2@v2.0.0-20250103191802-8c1959736554/manager/controlapi#MaxConfigSize).
     */
    public function setData(string $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }

    /**
     * Driver represents a driver (network, logging, secrets).
     */
    public function getTemplating(): Driver
    {
        return $this->templating;
    }

    /**
     * Driver represents a driver (network, logging, secrets).
     */
    public function setTemplating(Driver $templating): self
    {
        $this->initialized['templating'] = true;
        $this->templating = $templating;

        return $this;
    }
}
