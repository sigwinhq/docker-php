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

final class SwarmSpecCAConfigExternalCAsItem
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
     * Protocol for communication with the external CA (currently
     * only `cfssl` is supported).
     *
     * @var string
     */
    private $protocol = 'cfssl';
    /**
     * URL where certificate signing requests should be sent.
     *
     * @var string
     */
    private $uRL;
    /**
     * An object with key/value pairs that are interpreted as
     * protocol-specific options for the external CA driver.
     *
     * @var array<string, string>
     */
    private $options;
    /**
     * The root CA certificate (in PEM format) this external CA uses
     * to issue TLS certificates (assumed to be to the current swarm
     * root CA certificate if not provided).
     *
     * @var string
     */
    private $cACert;

    /**
     * Protocol for communication with the external CA (currently
     * only `cfssl` is supported).
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * Protocol for communication with the external CA (currently
     * only `cfssl` is supported).
     */
    public function setProtocol(string $protocol): self
    {
        $this->initialized['protocol'] = true;
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * URL where certificate signing requests should be sent.
     */
    public function getURL(): string
    {
        return $this->uRL;
    }

    /**
     * URL where certificate signing requests should be sent.
     */
    public function setURL(string $uRL): self
    {
        $this->initialized['uRL'] = true;
        $this->uRL = $uRL;

        return $this;
    }

    /**
     * An object with key/value pairs that are interpreted as
     * protocol-specific options for the external CA driver.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * An object with key/value pairs that are interpreted as
     * protocol-specific options for the external CA driver.
     *
     * @param array<string, string> $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * The root CA certificate (in PEM format) this external CA uses
     * to issue TLS certificates (assumed to be to the current swarm
     * root CA certificate if not provided).
     */
    public function getCACert(): string
    {
        return $this->cACert;
    }

    /**
     * The root CA certificate (in PEM format) this external CA uses
     * to issue TLS certificates (assumed to be to the current swarm
     * root CA certificate if not provided).
     */
    public function setCACert(string $cACert): self
    {
        $this->initialized['cACert'] = true;
        $this->cACert = $cACert;

        return $this;
    }
}
