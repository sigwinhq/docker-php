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

final class ContainerStorageStatsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerStorageStats::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerStorageStats::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerStorageStats();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('read_count_normalized', $data) && $data['read_count_normalized'] !== null) {
            $object->setReadCountNormalized($data['read_count_normalized']);
        } elseif (\array_key_exists('read_count_normalized', $data) && $data['read_count_normalized'] === null) {
            $object->setReadCountNormalized(null);
        }
        if (\array_key_exists('read_size_bytes', $data) && $data['read_size_bytes'] !== null) {
            $object->setReadSizeBytes($data['read_size_bytes']);
        } elseif (\array_key_exists('read_size_bytes', $data) && $data['read_size_bytes'] === null) {
            $object->setReadSizeBytes(null);
        }
        if (\array_key_exists('write_count_normalized', $data) && $data['write_count_normalized'] !== null) {
            $object->setWriteCountNormalized($data['write_count_normalized']);
        } elseif (\array_key_exists('write_count_normalized', $data) && $data['write_count_normalized'] === null) {
            $object->setWriteCountNormalized(null);
        }
        if (\array_key_exists('write_size_bytes', $data) && $data['write_size_bytes'] !== null) {
            $object->setWriteSizeBytes($data['write_size_bytes']);
        } elseif (\array_key_exists('write_size_bytes', $data) && $data['write_size_bytes'] === null) {
            $object->setWriteSizeBytes(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('readCountNormalized')) {
            $dataArray['read_count_normalized'] = $data->getReadCountNormalized();
        }
        if ($data->isInitialized('readSizeBytes')) {
            $dataArray['read_size_bytes'] = $data->getReadSizeBytes();
        }
        if ($data->isInitialized('writeCountNormalized')) {
            $dataArray['write_count_normalized'] = $data->getWriteCountNormalized();
        }
        if ($data->isInitialized('writeSizeBytes')) {
            $dataArray['write_size_bytes'] = $data->getWriteSizeBytes();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerStorageStats::class => false];
    }
}
