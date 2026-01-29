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

final class AuthResponse
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
     * The status of the authentication.
     *
     * @var string
     */
    private $status;
    /**
     * An opaque token used to authenticate a user after a successful login.
     *
     * @var string
     */
    private $identityToken;

    /**
     * The status of the authentication.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * The status of the authentication.
     */
    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * An opaque token used to authenticate a user after a successful login.
     */
    public function getIdentityToken(): string
    {
        return $this->identityToken;
    }

    /**
     * An opaque token used to authenticate a user after a successful login.
     */
    public function setIdentityToken(string $identityToken): self
    {
        $this->initialized['identityToken'] = true;
        $this->identityToken = $identityToken;

        return $this;
    }
}
