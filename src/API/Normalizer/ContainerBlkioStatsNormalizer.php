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

final class ContainerBlkioStatsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerBlkioStats::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerBlkioStats::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerBlkioStats();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('io_service_bytes_recursive', $data)) {
            $values = [];
            foreach ($data['io_service_bytes_recursive'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoServiceBytesRecursive($values);
        }
        if (\array_key_exists('io_serviced_recursive', $data) && $data['io_serviced_recursive'] !== null) {
            $values_1 = [];
            foreach ($data['io_serviced_recursive'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoServicedRecursive($values_1);
        } elseif (\array_key_exists('io_serviced_recursive', $data) && $data['io_serviced_recursive'] === null) {
            $object->setIoServicedRecursive(null);
        }
        if (\array_key_exists('io_queue_recursive', $data) && $data['io_queue_recursive'] !== null) {
            $values_2 = [];
            foreach ($data['io_queue_recursive'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoQueueRecursive($values_2);
        } elseif (\array_key_exists('io_queue_recursive', $data) && $data['io_queue_recursive'] === null) {
            $object->setIoQueueRecursive(null);
        }
        if (\array_key_exists('io_service_time_recursive', $data) && $data['io_service_time_recursive'] !== null) {
            $values_3 = [];
            foreach ($data['io_service_time_recursive'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoServiceTimeRecursive($values_3);
        } elseif (\array_key_exists('io_service_time_recursive', $data) && $data['io_service_time_recursive'] === null) {
            $object->setIoServiceTimeRecursive(null);
        }
        if (\array_key_exists('io_wait_time_recursive', $data) && $data['io_wait_time_recursive'] !== null) {
            $values_4 = [];
            foreach ($data['io_wait_time_recursive'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoWaitTimeRecursive($values_4);
        } elseif (\array_key_exists('io_wait_time_recursive', $data) && $data['io_wait_time_recursive'] === null) {
            $object->setIoWaitTimeRecursive(null);
        }
        if (\array_key_exists('io_merged_recursive', $data) && $data['io_merged_recursive'] !== null) {
            $values_5 = [];
            foreach ($data['io_merged_recursive'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoMergedRecursive($values_5);
        } elseif (\array_key_exists('io_merged_recursive', $data) && $data['io_merged_recursive'] === null) {
            $object->setIoMergedRecursive(null);
        }
        if (\array_key_exists('io_time_recursive', $data) && $data['io_time_recursive'] !== null) {
            $values_6 = [];
            foreach ($data['io_time_recursive'] as $value_6) {
                $values_6[] = $this->denormalizer->denormalize($value_6, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setIoTimeRecursive($values_6);
        } elseif (\array_key_exists('io_time_recursive', $data) && $data['io_time_recursive'] === null) {
            $object->setIoTimeRecursive(null);
        }
        if (\array_key_exists('sectors_recursive', $data) && $data['sectors_recursive'] !== null) {
            $values_7 = [];
            foreach ($data['sectors_recursive'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, \Docker\API\Model\ContainerBlkioStatEntry::class, 'json', $context);
            }
            $object->setSectorsRecursive($values_7);
        } elseif (\array_key_exists('sectors_recursive', $data) && $data['sectors_recursive'] === null) {
            $object->setSectorsRecursive(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('ioServiceBytesRecursive') && null !== $data->getIoServiceBytesRecursive()) {
            $values = [];
            foreach ($data->getIoServiceBytesRecursive() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['io_service_bytes_recursive'] = $values;
        }
        if ($data->isInitialized('ioServicedRecursive')) {
            $values_1 = [];
            foreach ($data->getIoServicedRecursive() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['io_serviced_recursive'] = $values_1;
        }
        if ($data->isInitialized('ioQueueRecursive')) {
            $values_2 = [];
            foreach ($data->getIoQueueRecursive() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['io_queue_recursive'] = $values_2;
        }
        if ($data->isInitialized('ioServiceTimeRecursive')) {
            $values_3 = [];
            foreach ($data->getIoServiceTimeRecursive() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['io_service_time_recursive'] = $values_3;
        }
        if ($data->isInitialized('ioWaitTimeRecursive')) {
            $values_4 = [];
            foreach ($data->getIoWaitTimeRecursive() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $dataArray['io_wait_time_recursive'] = $values_4;
        }
        if ($data->isInitialized('ioMergedRecursive')) {
            $values_5 = [];
            foreach ($data->getIoMergedRecursive() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $dataArray['io_merged_recursive'] = $values_5;
        }
        if ($data->isInitialized('ioTimeRecursive')) {
            $values_6 = [];
            foreach ($data->getIoTimeRecursive() as $value_6) {
                $values_6[] = $this->normalizer->normalize($value_6, 'json', $context);
            }
            $dataArray['io_time_recursive'] = $values_6;
        }
        if ($data->isInitialized('sectorsRecursive')) {
            $values_7 = [];
            foreach ($data->getSectorsRecursive() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $dataArray['sectors_recursive'] = $values_7;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerBlkioStats::class => false];
    }
}
