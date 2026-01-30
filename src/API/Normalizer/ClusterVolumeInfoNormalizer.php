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

final class ClusterVolumeInfoNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ClusterVolumeInfo::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ClusterVolumeInfo::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ClusterVolumeInfo();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CapacityBytes', $data)) {
            $object->setCapacityBytes($data['CapacityBytes']);
        }
        if (\array_key_exists('VolumeContext', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['VolumeContext'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setVolumeContext($values);
        }
        if (\array_key_exists('VolumeID', $data)) {
            $object->setVolumeID($data['VolumeID']);
        }
        if (\array_key_exists('AccessibleTopology', $data)) {
            $values_1 = [];
            foreach ($data['AccessibleTopology'] as $value_1) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value_1 as $key_1 => $value_2) {
                    $values_2[$key_1] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $object->setAccessibleTopology($values_1);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('capacityBytes') && null !== $data->getCapacityBytes()) {
            $dataArray['CapacityBytes'] = $data->getCapacityBytes();
        }
        if ($data->isInitialized('volumeContext') && null !== $data->getVolumeContext()) {
            $values = [];
            foreach ($data->getVolumeContext() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['VolumeContext'] = $values;
        }
        if ($data->isInitialized('volumeID') && null !== $data->getVolumeID()) {
            $dataArray['VolumeID'] = $data->getVolumeID();
        }
        if ($data->isInitialized('accessibleTopology') && null !== $data->getAccessibleTopology()) {
            $values_1 = [];
            foreach ($data->getAccessibleTopology() as $value_1) {
                $values_2 = [];
                foreach ($value_1 as $key_1 => $value_2) {
                    $values_2[$key_1] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $dataArray['AccessibleTopology'] = $values_1;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ClusterVolumeInfo::class => false];
    }
}
