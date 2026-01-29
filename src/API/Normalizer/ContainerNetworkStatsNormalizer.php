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

namespace Docker\API\Normalizer;

use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class ContainerNetworkStatsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerNetworkStats::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerNetworkStats::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerNetworkStats();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('rx_bytes', $data)) {
            $object->setRxBytes($data['rx_bytes']);
        }
        if (\array_key_exists('rx_packets', $data)) {
            $object->setRxPackets($data['rx_packets']);
        }
        if (\array_key_exists('rx_errors', $data)) {
            $object->setRxErrors($data['rx_errors']);
        }
        if (\array_key_exists('rx_dropped', $data)) {
            $object->setRxDropped($data['rx_dropped']);
        }
        if (\array_key_exists('tx_bytes', $data)) {
            $object->setTxBytes($data['tx_bytes']);
        }
        if (\array_key_exists('tx_packets', $data)) {
            $object->setTxPackets($data['tx_packets']);
        }
        if (\array_key_exists('tx_errors', $data)) {
            $object->setTxErrors($data['tx_errors']);
        }
        if (\array_key_exists('tx_dropped', $data)) {
            $object->setTxDropped($data['tx_dropped']);
        }
        if (\array_key_exists('endpoint_id', $data) && $data['endpoint_id'] !== null) {
            $object->setEndpointId($data['endpoint_id']);
        } elseif (\array_key_exists('endpoint_id', $data) && $data['endpoint_id'] === null) {
            $object->setEndpointId(null);
        }
        if (\array_key_exists('instance_id', $data) && $data['instance_id'] !== null) {
            $object->setInstanceId($data['instance_id']);
        } elseif (\array_key_exists('instance_id', $data) && $data['instance_id'] === null) {
            $object->setInstanceId(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('rxBytes') && null !== $data->getRxBytes()) {
            $dataArray['rx_bytes'] = $data->getRxBytes();
        }
        if ($data->isInitialized('rxPackets') && null !== $data->getRxPackets()) {
            $dataArray['rx_packets'] = $data->getRxPackets();
        }
        if ($data->isInitialized('rxErrors') && null !== $data->getRxErrors()) {
            $dataArray['rx_errors'] = $data->getRxErrors();
        }
        if ($data->isInitialized('rxDropped') && null !== $data->getRxDropped()) {
            $dataArray['rx_dropped'] = $data->getRxDropped();
        }
        if ($data->isInitialized('txBytes') && null !== $data->getTxBytes()) {
            $dataArray['tx_bytes'] = $data->getTxBytes();
        }
        if ($data->isInitialized('txPackets') && null !== $data->getTxPackets()) {
            $dataArray['tx_packets'] = $data->getTxPackets();
        }
        if ($data->isInitialized('txErrors') && null !== $data->getTxErrors()) {
            $dataArray['tx_errors'] = $data->getTxErrors();
        }
        if ($data->isInitialized('txDropped') && null !== $data->getTxDropped()) {
            $dataArray['tx_dropped'] = $data->getTxDropped();
        }
        if ($data->isInitialized('endpointId')) {
            $dataArray['endpoint_id'] = $data->getEndpointId();
        }
        if ($data->isInitialized('instanceId')) {
            $dataArray['instance_id'] = $data->getInstanceId();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerNetworkStats::class => false];
    }
}
