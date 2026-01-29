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

final class TaskSpecContainerSpecSecretsItem
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
     * File represents a specific target that is backed by a file.
     *
     * @var TaskSpecContainerSpecSecretsItemFile
     */
    private $file;
    /**
     * SecretID represents the ID of the specific secret that we're
     * referencing.
     *
     * @var string
     */
    private $secretID;
    /**
     * SecretName is the name of the secret that this references,
     * but this is just provided for lookup/display purposes. The
     * secret in the reference will be identified by its ID.
     *
     * @var string
     */
    private $secretName;

    /**
     * File represents a specific target that is backed by a file.
     */
    public function getFile(): TaskSpecContainerSpecSecretsItemFile
    {
        return $this->file;
    }

    /**
     * File represents a specific target that is backed by a file.
     */
    public function setFile(TaskSpecContainerSpecSecretsItemFile $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * SecretID represents the ID of the specific secret that we're
     * referencing.
     */
    public function getSecretID(): string
    {
        return $this->secretID;
    }

    /**
     * SecretID represents the ID of the specific secret that we're
     * referencing.
     */
    public function setSecretID(string $secretID): self
    {
        $this->initialized['secretID'] = true;
        $this->secretID = $secretID;

        return $this;
    }

    /**
     * SecretName is the name of the secret that this references,
     * but this is just provided for lookup/display purposes. The
     * secret in the reference will be identified by its ID.
     */
    public function getSecretName(): string
    {
        return $this->secretName;
    }

    /**
     * SecretName is the name of the secret that this references,
     * but this is just provided for lookup/display purposes. The
     * secret in the reference will be identified by its ID.
     */
    public function setSecretName(string $secretName): self
    {
        $this->initialized['secretName'] = true;
        $this->secretName = $secretName;

        return $this;
    }
}
