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

final class Runtime
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
     * Name and, optional, path, of the OCI executable binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     *
     * @var string
     */
    private $path;
    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @var null|list<string>
     */
    private $runtimeArgs;
    /**
     * Information specific to the runtime.
     *
     * While this API specification does not define data provided by runtimes,
     * the following well-known properties may be provided by runtimes:
     *
     * `org.opencontainers.runtime-spec.features`: features structure as defined
     * in the [OCI Runtime Specification](https://github.com/opencontainers/runtime-spec/blob/main/features.md),
     * in a JSON string representation.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @var null|array<string, string>
     */
    private $status;

    /**
     * Name and, optional, path, of the OCI executable binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Name and, optional, path, of the OCI executable binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;

        return $this;
    }

    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @return null|list<string>
     */
    public function getRuntimeArgs(): ?array
    {
        return $this->runtimeArgs;
    }

    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @param null|list<string> $runtimeArgs
     */
    public function setRuntimeArgs(?array $runtimeArgs): self
    {
        $this->initialized['runtimeArgs'] = true;
        $this->runtimeArgs = $runtimeArgs;

        return $this;
    }

    /**
     * Information specific to the runtime.
     *
     * While this API specification does not define data provided by runtimes,
     * the following well-known properties may be provided by runtimes:
     *
     * `org.opencontainers.runtime-spec.features`: features structure as defined
     * in the [OCI Runtime Specification](https://github.com/opencontainers/runtime-spec/blob/main/features.md),
     * in a JSON string representation.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @return null|array<string, string>
     */
    public function getStatus(): ?iterable
    {
        return $this->status;
    }

    /**
     * Information specific to the runtime.
     *
     * While this API specification does not define data provided by runtimes,
     * the following well-known properties may be provided by runtimes:
     *
     * `org.opencontainers.runtime-spec.features`: features structure as defined
     * in the [OCI Runtime Specification](https://github.com/opencontainers/runtime-spec/blob/main/features.md),
     * in a JSON string representation.
     *
     * <p><br /></p>
     *
     * > **Note**: The information returned in this field, including the
     * > formatting of values and labels, should not be considered stable,
     * > and may change without notice.
     *
     * @param null|array<string, string> $status
     */
    public function setStatus(?iterable $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }
}
