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

final class SystemDfGetResponse200Normalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\SystemDfGetResponse200::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\SystemDfGetResponse200::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SystemDfGetResponse200();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ImagesDiskUsage', $data)) {
            $object->setImagesDiskUsage($this->denormalizer->denormalize($data['ImagesDiskUsage'], \Docker\API\Model\ImagesDiskUsage::class, 'json', $context));
        }
        if (\array_key_exists('ContainersDiskUsage', $data)) {
            $object->setContainersDiskUsage($this->denormalizer->denormalize($data['ContainersDiskUsage'], \Docker\API\Model\ContainersDiskUsage::class, 'json', $context));
        }
        if (\array_key_exists('VolumesDiskUsage', $data)) {
            $object->setVolumesDiskUsage($this->denormalizer->denormalize($data['VolumesDiskUsage'], \Docker\API\Model\VolumesDiskUsage::class, 'json', $context));
        }
        if (\array_key_exists('BuildCacheDiskUsage', $data)) {
            $object->setBuildCacheDiskUsage($this->denormalizer->denormalize($data['BuildCacheDiskUsage'], \Docker\API\Model\BuildCacheDiskUsage::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('imagesDiskUsage') && null !== $data->getImagesDiskUsage()) {
            $dataArray['ImagesDiskUsage'] = $this->normalizer->normalize($data->getImagesDiskUsage(), 'json', $context);
        }
        if ($data->isInitialized('containersDiskUsage') && null !== $data->getContainersDiskUsage()) {
            $dataArray['ContainersDiskUsage'] = $this->normalizer->normalize($data->getContainersDiskUsage(), 'json', $context);
        }
        if ($data->isInitialized('volumesDiskUsage') && null !== $data->getVolumesDiskUsage()) {
            $dataArray['VolumesDiskUsage'] = $this->normalizer->normalize($data->getVolumesDiskUsage(), 'json', $context);
        }
        if ($data->isInitialized('buildCacheDiskUsage') && null !== $data->getBuildCacheDiskUsage()) {
            $dataArray['BuildCacheDiskUsage'] = $this->normalizer->normalize($data->getBuildCacheDiskUsage(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SystemDfGetResponse200::class => false];
    }
}
