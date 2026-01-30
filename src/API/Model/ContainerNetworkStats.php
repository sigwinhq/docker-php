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

final class ContainerNetworkStats
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
     * Bytes received. Windows and Linux.
     *
     * @var int
     */
    private $rxBytes;
    /**
     * Packets received. Windows and Linux.
     *
     * @var int
     */
    private $rxPackets;
    /**
     * Received errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     *
     * @var int
     */
    private $rxErrors;
    /**
     * Incoming packets dropped. Windows and Linux.
     *
     * @var int
     */
    private $rxDropped;
    /**
     * Bytes sent. Windows and Linux.
     *
     * @var int
     */
    private $txBytes;
    /**
     * Packets sent. Windows and Linux.
     *
     * @var int
     */
    private $txPackets;
    /**
     * Sent errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     *
     * @var int
     */
    private $txErrors;
    /**
     * Outgoing packets dropped. Windows and Linux.
     *
     * @var int
     */
    private $txDropped;
    /**
     * Endpoint ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var null|string
     */
    private $endpointId;
    /**
     * Instance ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     *
     * @var null|string
     */
    private $instanceId;

    /**
     * Bytes received. Windows and Linux.
     */
    public function getRxBytes(): int
    {
        return $this->rxBytes;
    }

    /**
     * Bytes received. Windows and Linux.
     */
    public function setRxBytes(int $rxBytes): self
    {
        $this->initialized['rxBytes'] = true;
        $this->rxBytes = $rxBytes;

        return $this;
    }

    /**
     * Packets received. Windows and Linux.
     */
    public function getRxPackets(): int
    {
        return $this->rxPackets;
    }

    /**
     * Packets received. Windows and Linux.
     */
    public function setRxPackets(int $rxPackets): self
    {
        $this->initialized['rxPackets'] = true;
        $this->rxPackets = $rxPackets;

        return $this;
    }

    /**
     * Received errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function getRxErrors(): int
    {
        return $this->rxErrors;
    }

    /**
     * Received errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function setRxErrors(int $rxErrors): self
    {
        $this->initialized['rxErrors'] = true;
        $this->rxErrors = $rxErrors;

        return $this;
    }

    /**
     * Incoming packets dropped. Windows and Linux.
     */
    public function getRxDropped(): int
    {
        return $this->rxDropped;
    }

    /**
     * Incoming packets dropped. Windows and Linux.
     */
    public function setRxDropped(int $rxDropped): self
    {
        $this->initialized['rxDropped'] = true;
        $this->rxDropped = $rxDropped;

        return $this;
    }

    /**
     * Bytes sent. Windows and Linux.
     */
    public function getTxBytes(): int
    {
        return $this->txBytes;
    }

    /**
     * Bytes sent. Windows and Linux.
     */
    public function setTxBytes(int $txBytes): self
    {
        $this->initialized['txBytes'] = true;
        $this->txBytes = $txBytes;

        return $this;
    }

    /**
     * Packets sent. Windows and Linux.
     */
    public function getTxPackets(): int
    {
        return $this->txPackets;
    }

    /**
     * Packets sent. Windows and Linux.
     */
    public function setTxPackets(int $txPackets): self
    {
        $this->initialized['txPackets'] = true;
        $this->txPackets = $txPackets;

        return $this;
    }

    /**
     * Sent errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function getTxErrors(): int
    {
        return $this->txErrors;
    }

    /**
     * Sent errors. Not used on Windows.
     *
     * This field is Linux-specific and always zero for Windows containers.
     */
    public function setTxErrors(int $txErrors): self
    {
        $this->initialized['txErrors'] = true;
        $this->txErrors = $txErrors;

        return $this;
    }

    /**
     * Outgoing packets dropped. Windows and Linux.
     */
    public function getTxDropped(): int
    {
        return $this->txDropped;
    }

    /**
     * Outgoing packets dropped. Windows and Linux.
     */
    public function setTxDropped(int $txDropped): self
    {
        $this->initialized['txDropped'] = true;
        $this->txDropped = $txDropped;

        return $this;
    }

    /**
     * Endpoint ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getEndpointId(): ?string
    {
        return $this->endpointId;
    }

    /**
     * Endpoint ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setEndpointId(?string $endpointId): self
    {
        $this->initialized['endpointId'] = true;
        $this->endpointId = $endpointId;

        return $this;
    }

    /**
     * Instance ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function getInstanceId(): ?string
    {
        return $this->instanceId;
    }

    /**
     * Instance ID. Not used on Linux.
     *
     * This field is Windows-specific and omitted for Linux containers.
     */
    public function setInstanceId(?string $instanceId): self
    {
        $this->initialized['instanceId'] = true;
        $this->instanceId = $instanceId;

        return $this;
    }
}
