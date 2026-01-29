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

final class BuildCache
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
     * Unique ID of the build cache record.
     *
     * @var string
     */
    private $iD;
    /**
     * List of parent build cache record IDs.
     *
     * @var null|list<string>
     */
    private $parents;
    /**
     * Cache record type.
     *
     * @var string
     */
    private $type;
    /**
     * Description of the build-step that produced the build cache.
     *
     * @var string
     */
    private $description;
    /**
     * Indicates if the build cache is in use.
     *
     * @var bool
     */
    private $inUse;
    /**
     * Indicates if the build cache is shared.
     *
     * @var bool
     */
    private $shared;
    /**
     * Amount of disk space used by the build cache (in bytes).
     *
     * @var int
     */
    private $size;
    /**
     * Date and time at which the build cache was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string
     */
    private $createdAt;
    /**
     * Date and time at which the build cache was last used in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var null|string
     */
    private $lastUsedAt;
    /**
     * @var int
     */
    private $usageCount;

    /**
     * Unique ID of the build cache record.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * Unique ID of the build cache record.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * List of parent build cache record IDs.
     *
     * @return null|list<string>
     */
    public function getParents(): ?array
    {
        return $this->parents;
    }

    /**
     * List of parent build cache record IDs.
     *
     * @param null|list<string> $parents
     */
    public function setParents(?array $parents): self
    {
        $this->initialized['parents'] = true;
        $this->parents = $parents;

        return $this;
    }

    /**
     * Cache record type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Cache record type.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Description of the build-step that produced the build cache.
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Description of the build-step that produced the build cache.
     */
    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Indicates if the build cache is in use.
     */
    public function getInUse(): bool
    {
        return $this->inUse;
    }

    /**
     * Indicates if the build cache is in use.
     */
    public function setInUse(bool $inUse): self
    {
        $this->initialized['inUse'] = true;
        $this->inUse = $inUse;

        return $this;
    }

    /**
     * Indicates if the build cache is shared.
     */
    public function getShared(): bool
    {
        return $this->shared;
    }

    /**
     * Indicates if the build cache is shared.
     */
    public function setShared(bool $shared): self
    {
        $this->initialized['shared'] = true;
        $this->shared = $shared;

        return $this;
    }

    /**
     * Amount of disk space used by the build cache (in bytes).
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Amount of disk space used by the build cache (in bytes).
     */
    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Date and time at which the build cache was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Date and time at which the build cache was created in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date and time at which the build cache was last used in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getLastUsedAt(): ?string
    {
        return $this->lastUsedAt;
    }

    /**
     * Date and time at which the build cache was last used in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setLastUsedAt(?string $lastUsedAt): self
    {
        $this->initialized['lastUsedAt'] = true;
        $this->lastUsedAt = $lastUsedAt;

        return $this;
    }

    public function getUsageCount(): int
    {
        return $this->usageCount;
    }

    public function setUsageCount(int $usageCount): self
    {
        $this->initialized['usageCount'] = true;
        $this->usageCount = $usageCount;

        return $this;
    }
}
