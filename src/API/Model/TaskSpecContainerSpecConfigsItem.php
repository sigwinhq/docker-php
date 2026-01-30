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

final class TaskSpecContainerSpecConfigsItem
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
     * <p><br /><p>
     *
     * > **Note**: `Configs.File` and `Configs.Runtime` are mutually exclusive
     *
     * @var TaskSpecContainerSpecConfigsItemFile
     */
    private $file;
    /**
     * Runtime represents a target that is not mounted into the
     * container but is used by the task.
     *
     * <p><br /><p>
     *
     * > **Note**: `Configs.File` and `Configs.Runtime` are mutually
     * > exclusive
     */
    private $runtime;
    /**
     * ConfigID represents the ID of the specific config that we're
     * referencing.
     *
     * @var string
     */
    private $configID;
    /**
     * ConfigName is the name of the config that this references,
     * but this is just provided for lookup/display purposes. The
     * config in the reference will be identified by its ID.
     *
     * @var string
     */
    private $configName;

    /**
     * File represents a specific target that is backed by a file.
     *
     * <p><br /><p>
     *
     * > **Note**: `Configs.File` and `Configs.Runtime` are mutually exclusive
     */
    public function getFile(): TaskSpecContainerSpecConfigsItemFile
    {
        return $this->file;
    }

    /**
     * File represents a specific target that is backed by a file.
     *
     * <p><br /><p>
     *
     * > **Note**: `Configs.File` and `Configs.Runtime` are mutually exclusive
     */
    public function setFile(TaskSpecContainerSpecConfigsItemFile $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * Runtime represents a target that is not mounted into the
     * container but is used by the task.
     *
     * <p><br /><p>
     *
     * > **Note**: `Configs.File` and `Configs.Runtime` are mutually
     * > exclusive
     */
    public function getRuntime(): mixed
    {
        return $this->runtime;
    }

    /**
     * Runtime represents a target that is not mounted into the
     * container but is used by the task.
     *
     * <p><br /><p>
     *
     * > **Note**: `Configs.File` and `Configs.Runtime` are mutually
     * > exclusive
     */
    public function setRuntime($runtime): self
    {
        $this->initialized['runtime'] = true;
        $this->runtime = $runtime;

        return $this;
    }

    /**
     * ConfigID represents the ID of the specific config that we're
     * referencing.
     */
    public function getConfigID(): string
    {
        return $this->configID;
    }

    /**
     * ConfigID represents the ID of the specific config that we're
     * referencing.
     */
    public function setConfigID(string $configID): self
    {
        $this->initialized['configID'] = true;
        $this->configID = $configID;

        return $this;
    }

    /**
     * ConfigName is the name of the config that this references,
     * but this is just provided for lookup/display purposes. The
     * config in the reference will be identified by its ID.
     */
    public function getConfigName(): string
    {
        return $this->configName;
    }

    /**
     * ConfigName is the name of the config that this references,
     * but this is just provided for lookup/display purposes. The
     * config in the reference will be identified by its ID.
     */
    public function setConfigName(string $configName): self
    {
        $this->initialized['configName'] = true;
        $this->configName = $configName;

        return $this;
    }
}
