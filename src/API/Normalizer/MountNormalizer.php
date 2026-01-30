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

final class MountNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\Mount::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\Mount::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\Mount();
        if (\array_key_exists('ReadOnly', $data) && \is_int($data['ReadOnly'])) {
            $data['ReadOnly'] = (bool) $data['ReadOnly'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Target', $data)) {
            $object->setTarget($data['Target']);
        }
        if (\array_key_exists('Source', $data)) {
            $object->setSource($data['Source']);
        }
        if (\array_key_exists('Type', $data)) {
            $object->setType($data['Type']);
        }
        if (\array_key_exists('ReadOnly', $data)) {
            $object->setReadOnly($data['ReadOnly']);
        }
        if (\array_key_exists('Consistency', $data)) {
            $object->setConsistency($data['Consistency']);
        }
        if (\array_key_exists('BindOptions', $data)) {
            $object->setBindOptions($this->denormalizer->denormalize($data['BindOptions'], \Docker\API\Model\MountBindOptions::class, 'json', $context));
        }
        if (\array_key_exists('VolumeOptions', $data)) {
            $object->setVolumeOptions($this->denormalizer->denormalize($data['VolumeOptions'], \Docker\API\Model\MountVolumeOptions::class, 'json', $context));
        }
        if (\array_key_exists('ImageOptions', $data)) {
            $object->setImageOptions($this->denormalizer->denormalize($data['ImageOptions'], \Docker\API\Model\MountImageOptions::class, 'json', $context));
        }
        if (\array_key_exists('TmpfsOptions', $data)) {
            $object->setTmpfsOptions($this->denormalizer->denormalize($data['TmpfsOptions'], \Docker\API\Model\MountTmpfsOptions::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('target') && null !== $data->getTarget()) {
            $dataArray['Target'] = $data->getTarget();
        }
        if ($data->isInitialized('source') && null !== $data->getSource()) {
            $dataArray['Source'] = $data->getSource();
        }
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['Type'] = $data->getType();
        }
        if ($data->isInitialized('readOnly') && null !== $data->getReadOnly()) {
            $dataArray['ReadOnly'] = $data->getReadOnly();
        }
        if ($data->isInitialized('consistency') && null !== $data->getConsistency()) {
            $dataArray['Consistency'] = $data->getConsistency();
        }
        if ($data->isInitialized('bindOptions') && null !== $data->getBindOptions()) {
            $dataArray['BindOptions'] = $this->normalizer->normalize($data->getBindOptions(), 'json', $context);
        }
        if ($data->isInitialized('volumeOptions') && null !== $data->getVolumeOptions()) {
            $dataArray['VolumeOptions'] = $this->normalizer->normalize($data->getVolumeOptions(), 'json', $context);
        }
        if ($data->isInitialized('imageOptions') && null !== $data->getImageOptions()) {
            $dataArray['ImageOptions'] = $this->normalizer->normalize($data->getImageOptions(), 'json', $context);
        }
        if ($data->isInitialized('tmpfsOptions') && null !== $data->getTmpfsOptions()) {
            $dataArray['TmpfsOptions'] = $this->normalizer->normalize($data->getTmpfsOptions(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\Mount::class => false];
    }
}
