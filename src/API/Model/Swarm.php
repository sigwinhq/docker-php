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

final class Swarm
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
     * The ID of the swarm.
     *
     * @var string
     */
    private $iD;
    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     *
     * @var ObjectVersion
     */
    private $version;
    /**
     * Date and time at which the swarm was initialised in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string
     */
    private $createdAt;
    /**
     * Date and time at which the swarm was last updated in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string
     */
    private $updatedAt;
    /**
     * User modifiable swarm configuration.
     *
     * @var SwarmSpec
     */
    private $spec;
    /**
     * Information about the issuer of leaf TLS certificates and the trusted root
     * CA certificate.
     *
     * @var TLSInfo
     */
    private $tLSInfo;
    /**
     * Whether there is currently a root CA rotation in progress for the swarm.
     *
     * @var bool
     */
    private $rootRotationInProgress;
    /**
     * DataPathPort specifies the data path port number for data traffic.
     * Acceptable port range is 1024 to 49151.
     * If no port is set or is set to 0, the default port (4789) is used.
     *
     * @var int
     */
    private $dataPathPort = 4789;
    /**
     * Default Address Pool specifies default subnet pools for global scope
     * networks.
     *
     * @var list<string>
     */
    private $defaultAddrPool;
    /**
     * SubnetSize specifies the subnet size of the networks created from the
     * default subnet pool.
     *
     * @var int
     */
    private $subnetSize = 24;
    /**
     * JoinTokens contains the tokens workers and managers need to join the swarm.
     *
     * @var JoinTokens
     */
    private $joinTokens;

    /**
     * The ID of the swarm.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the swarm.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;

        return $this;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     */
    public function getVersion(): ObjectVersion
    {
        return $this->version;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed
     * to avoid conflicting writes. The client must send the version number along
     * with the modified specification when updating these objects.
     *
     * This approach ensures safe concurrency and determinism in that the change
     * on the object may not be applied if the version number has changed from the
     * last read. In other words, if two update requests specify the same base
     * version, only one of the requests can succeed. As a result, two separate
     * update requests that happen at the same time will not unintentionally
     * overwrite each other.
     */
    public function setVersion(ObjectVersion $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;

        return $this;
    }

    /**
     * Date and time at which the swarm was initialised in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Date and time at which the swarm was initialised in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Date and time at which the swarm was last updated in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Date and time at which the swarm was last updated in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * User modifiable swarm configuration.
     */
    public function getSpec(): SwarmSpec
    {
        return $this->spec;
    }

    /**
     * User modifiable swarm configuration.
     */
    public function setSpec(SwarmSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;

        return $this;
    }

    /**
     * Information about the issuer of leaf TLS certificates and the trusted root
     * CA certificate.
     */
    public function getTLSInfo(): TLSInfo
    {
        return $this->tLSInfo;
    }

    /**
     * Information about the issuer of leaf TLS certificates and the trusted root
     * CA certificate.
     */
    public function setTLSInfo(TLSInfo $tLSInfo): self
    {
        $this->initialized['tLSInfo'] = true;
        $this->tLSInfo = $tLSInfo;

        return $this;
    }

    /**
     * Whether there is currently a root CA rotation in progress for the swarm.
     */
    public function getRootRotationInProgress(): bool
    {
        return $this->rootRotationInProgress;
    }

    /**
     * Whether there is currently a root CA rotation in progress for the swarm.
     */
    public function setRootRotationInProgress(bool $rootRotationInProgress): self
    {
        $this->initialized['rootRotationInProgress'] = true;
        $this->rootRotationInProgress = $rootRotationInProgress;

        return $this;
    }

    /**
     * DataPathPort specifies the data path port number for data traffic.
     * Acceptable port range is 1024 to 49151.
     * If no port is set or is set to 0, the default port (4789) is used.
     */
    public function getDataPathPort(): int
    {
        return $this->dataPathPort;
    }

    /**
     * DataPathPort specifies the data path port number for data traffic.
     * Acceptable port range is 1024 to 49151.
     * If no port is set or is set to 0, the default port (4789) is used.
     */
    public function setDataPathPort(int $dataPathPort): self
    {
        $this->initialized['dataPathPort'] = true;
        $this->dataPathPort = $dataPathPort;

        return $this;
    }

    /**
     * Default Address Pool specifies default subnet pools for global scope
     * networks.
     *
     * @return list<string>
     */
    public function getDefaultAddrPool(): array
    {
        return $this->defaultAddrPool;
    }

    /**
     * Default Address Pool specifies default subnet pools for global scope
     * networks.
     *
     * @param list<string> $defaultAddrPool
     */
    public function setDefaultAddrPool(array $defaultAddrPool): self
    {
        $this->initialized['defaultAddrPool'] = true;
        $this->defaultAddrPool = $defaultAddrPool;

        return $this;
    }

    /**
     * SubnetSize specifies the subnet size of the networks created from the
     * default subnet pool.
     */
    public function getSubnetSize(): int
    {
        return $this->subnetSize;
    }

    /**
     * SubnetSize specifies the subnet size of the networks created from the
     * default subnet pool.
     */
    public function setSubnetSize(int $subnetSize): self
    {
        $this->initialized['subnetSize'] = true;
        $this->subnetSize = $subnetSize;

        return $this;
    }

    /**
     * JoinTokens contains the tokens workers and managers need to join the swarm.
     */
    public function getJoinTokens(): JoinTokens
    {
        return $this->joinTokens;
    }

    /**
     * JoinTokens contains the tokens workers and managers need to join the swarm.
     */
    public function setJoinTokens(JoinTokens $joinTokens): self
    {
        $this->initialized['joinTokens'] = true;
        $this->joinTokens = $joinTokens;

        return $this;
    }
}
