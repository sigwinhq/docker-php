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

final class BuildCacheDiskUsageNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\BuildCacheDiskUsage::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\BuildCacheDiskUsage::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\BuildCacheDiskUsage();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ActiveCount', $data)) {
            $object->setActiveCount($data['ActiveCount']);
        }
        if (\array_key_exists('TotalCount', $data)) {
            $object->setTotalCount($data['TotalCount']);
        }
        if (\array_key_exists('Reclaimable', $data)) {
            $object->setReclaimable($data['Reclaimable']);
        }
        if (\array_key_exists('TotalSize', $data)) {
            $object->setTotalSize($data['TotalSize']);
        }
        if (\array_key_exists('Items', $data)) {
            $values = [];
            foreach ($data['Items'] as $value) {
                $values[] = $value;
            }
            $object->setItems($values);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('activeCount') && null !== $data->getActiveCount()) {
            $dataArray['ActiveCount'] = $data->getActiveCount();
        }
        if ($data->isInitialized('totalCount') && null !== $data->getTotalCount()) {
            $dataArray['TotalCount'] = $data->getTotalCount();
        }
        if ($data->isInitialized('reclaimable') && null !== $data->getReclaimable()) {
            $dataArray['Reclaimable'] = $data->getReclaimable();
        }
        if ($data->isInitialized('totalSize') && null !== $data->getTotalSize()) {
            $dataArray['TotalSize'] = $data->getTotalSize();
        }
        if ($data->isInitialized('items') && null !== $data->getItems()) {
            $values = [];
            foreach ($data->getItems() as $value) {
                $values[] = $value;
            }
            $dataArray['Items'] = $values;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\BuildCacheDiskUsage::class => false];
    }
}
