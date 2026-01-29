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

final class BuildInfo
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
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $stream;
    /**
     * @var ErrorDetail
     */
    private $errorDetail;
    /**
     * @var string
     */
    private $status;
    /**
     * @var ProgressDetail
     */
    private $progressDetail;
    /**
     * Image ID or Digest.
     *
     * @var ImageID
     */
    private $aux;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getStream(): string
    {
        return $this->stream;
    }

    public function setStream(string $stream): self
    {
        $this->initialized['stream'] = true;
        $this->stream = $stream;

        return $this;
    }

    public function getErrorDetail(): ErrorDetail
    {
        return $this->errorDetail;
    }

    public function setErrorDetail(ErrorDetail $errorDetail): self
    {
        $this->initialized['errorDetail'] = true;
        $this->errorDetail = $errorDetail;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    public function getProgressDetail(): ProgressDetail
    {
        return $this->progressDetail;
    }

    public function setProgressDetail(ProgressDetail $progressDetail): self
    {
        $this->initialized['progressDetail'] = true;
        $this->progressDetail = $progressDetail;

        return $this;
    }

    /**
     * Image ID or Digest.
     */
    public function getAux(): ImageID
    {
        return $this->aux;
    }

    /**
     * Image ID or Digest.
     */
    public function setAux(ImageID $aux): self
    {
        $this->initialized['aux'] = true;
        $this->aux = $aux;

        return $this;
    }
}
