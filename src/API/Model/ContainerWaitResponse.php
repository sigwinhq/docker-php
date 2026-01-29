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

final class ContainerWaitResponse
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
     * Exit code of the container.
     *
     * @var int
     */
    private $statusCode;
    /**
     * container waiting error, if any.
     *
     * @var ContainerWaitExitError
     */
    private $error;

    /**
     * Exit code of the container.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Exit code of the container.
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->initialized['statusCode'] = true;
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * container waiting error, if any.
     */
    public function getError(): ContainerWaitExitError
    {
        return $this->error;
    }

    /**
     * container waiting error, if any.
     */
    public function setError(ContainerWaitExitError $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;

        return $this;
    }
}
