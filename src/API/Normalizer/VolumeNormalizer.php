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

final class VolumeNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\Volume::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\Volume::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Volume();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
        }
        if (\array_key_exists('Mountpoint', $data)) {
            $object->setMountpoint($data['Mountpoint']);
        }
        if (\array_key_exists('CreatedAt', $data)) {
            $object->setCreatedAt($data['CreatedAt']);
        }
        if (\array_key_exists('Status', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Status'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setStatus($values);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setLabels($values_1);
        }
        if (\array_key_exists('Scope', $data)) {
            $object->setScope($data['Scope']);
        }
        if (\array_key_exists('ClusterVolume', $data)) {
            $object->setClusterVolume($this->denormalizer->denormalize($data['ClusterVolume'], \Docker\API\Model\ClusterVolume::class, 'json', $context));
        }
        if (\array_key_exists('Options', $data)) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setOptions($values_2);
        }
        if (\array_key_exists('UsageData', $data) && $data['UsageData'] !== null) {
            $object->setUsageData($this->denormalizer->denormalize($data['UsageData'], \Docker\API\Model\VolumeUsageData::class, 'json', $context));
        } elseif (\array_key_exists('UsageData', $data) && $data['UsageData'] === null) {
            $object->setUsageData(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['Name'] = $data->getName();
        $dataArray['Driver'] = $data->getDriver();
        $dataArray['Mountpoint'] = $data->getMountpoint();
        if ($data->isInitialized('createdAt') && null !== $data->getCreatedAt()) {
            $dataArray['CreatedAt'] = $data->getCreatedAt();
        }
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $values = [];
            foreach ($data->getStatus() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Status'] = $values;
        }
        $values_1 = [];
        foreach ($data->getLabels() as $key_1 => $value_1) {
            $values_1[$key_1] = $value_1;
        }
        $dataArray['Labels'] = $values_1;
        $dataArray['Scope'] = $data->getScope();
        if ($data->isInitialized('clusterVolume') && null !== $data->getClusterVolume()) {
            $dataArray['ClusterVolume'] = $this->normalizer->normalize($data->getClusterVolume(), 'json', $context);
        }
        $values_2 = [];
        foreach ($data->getOptions() as $key_2 => $value_2) {
            $values_2[$key_2] = $value_2;
        }
        $dataArray['Options'] = $values_2;
        if ($data->isInitialized('usageData')) {
            $dataArray['UsageData'] = $this->normalizer->normalize($data->getUsageData(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Volume::class => false];
    }
}
