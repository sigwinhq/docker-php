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

final class IndexInfo
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
     * Name of the registry, such as "docker.io".
     *
     * @var string
     */
    private $name;
    /**
     * List of mirrors, expressed as URIs.
     *
     * @var list<string>
     */
    private $mirrors;
    /**
     * Indicates if the registry is part of the list of insecure
     * registries.
     *
     * If `false`, the registry is insecure. Insecure registries accept
     * un-encrypted (HTTP) and/or untrusted (HTTPS with certificates from
     * unknown CAs) communication.
     *
     * > **Warning**: Insecure registries can be useful when running a local
     * > registry. However, because its use creates security vulnerabilities
     * > it should ONLY be enabled for testing purposes. For increased
     * > security, users should add their CA to their system's list of
     * > trusted CAs instead of enabling this option.
     *
     * @var bool
     */
    private $secure;
    /**
     * Indicates whether this is an official registry (i.e., Docker Hub / docker.io).
     *
     * @var bool
     */
    private $official;

    /**
     * Name of the registry, such as "docker.io".
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the registry, such as "docker.io".
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * List of mirrors, expressed as URIs.
     *
     * @return list<string>
     */
    public function getMirrors(): array
    {
        return $this->mirrors;
    }

    /**
     * List of mirrors, expressed as URIs.
     *
     * @param list<string> $mirrors
     */
    public function setMirrors(array $mirrors): self
    {
        $this->initialized['mirrors'] = true;
        $this->mirrors = $mirrors;

        return $this;
    }

    /**
     * Indicates if the registry is part of the list of insecure
     * registries.
     *
     * If `false`, the registry is insecure. Insecure registries accept
     * un-encrypted (HTTP) and/or untrusted (HTTPS with certificates from
     * unknown CAs) communication.
     *
     * > **Warning**: Insecure registries can be useful when running a local
     * > registry. However, because its use creates security vulnerabilities
     * > it should ONLY be enabled for testing purposes. For increased
     * > security, users should add their CA to their system's list of
     * > trusted CAs instead of enabling this option.
     */
    public function getSecure(): bool
    {
        return $this->secure;
    }

    /**
     * Indicates if the registry is part of the list of insecure
     * registries.
     *
     * If `false`, the registry is insecure. Insecure registries accept
     * un-encrypted (HTTP) and/or untrusted (HTTPS with certificates from
     * unknown CAs) communication.
     *
     * > **Warning**: Insecure registries can be useful when running a local
     * > registry. However, because its use creates security vulnerabilities
     * > it should ONLY be enabled for testing purposes. For increased
     * > security, users should add their CA to their system's list of
     * > trusted CAs instead of enabling this option.
     */
    public function setSecure(bool $secure): self
    {
        $this->initialized['secure'] = true;
        $this->secure = $secure;

        return $this;
    }

    /**
     * Indicates whether this is an official registry (i.e., Docker Hub / docker.io).
     */
    public function getOfficial(): bool
    {
        return $this->official;
    }

    /**
     * Indicates whether this is an official registry (i.e., Docker Hub / docker.io).
     */
    public function setOfficial(bool $official): self
    {
        $this->initialized['official'] = true;
        $this->official = $official;

        return $this;
    }
}
