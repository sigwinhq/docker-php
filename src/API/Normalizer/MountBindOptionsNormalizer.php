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

final class MountBindOptionsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\MountBindOptions::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\MountBindOptions::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\MountBindOptions();
        if (\array_key_exists('NonRecursive', $data) && \is_int($data['NonRecursive'])) {
            $data['NonRecursive'] = (bool) $data['NonRecursive'];
        }
        if (\array_key_exists('CreateMountpoint', $data) && \is_int($data['CreateMountpoint'])) {
            $data['CreateMountpoint'] = (bool) $data['CreateMountpoint'];
        }
        if (\array_key_exists('ReadOnlyNonRecursive', $data) && \is_int($data['ReadOnlyNonRecursive'])) {
            $data['ReadOnlyNonRecursive'] = (bool) $data['ReadOnlyNonRecursive'];
        }
        if (\array_key_exists('ReadOnlyForceRecursive', $data) && \is_int($data['ReadOnlyForceRecursive'])) {
            $data['ReadOnlyForceRecursive'] = (bool) $data['ReadOnlyForceRecursive'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Propagation', $data)) {
            $object->setPropagation($data['Propagation']);
        }
        if (\array_key_exists('NonRecursive', $data)) {
            $object->setNonRecursive($data['NonRecursive']);
        }
        if (\array_key_exists('CreateMountpoint', $data)) {
            $object->setCreateMountpoint($data['CreateMountpoint']);
        }
        if (\array_key_exists('ReadOnlyNonRecursive', $data)) {
            $object->setReadOnlyNonRecursive($data['ReadOnlyNonRecursive']);
        }
        if (\array_key_exists('ReadOnlyForceRecursive', $data)) {
            $object->setReadOnlyForceRecursive($data['ReadOnlyForceRecursive']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('propagation') && null !== $data->getPropagation()) {
            $dataArray['Propagation'] = $data->getPropagation();
        }
        if ($data->isInitialized('nonRecursive') && null !== $data->getNonRecursive()) {
            $dataArray['NonRecursive'] = $data->getNonRecursive();
        }
        if ($data->isInitialized('createMountpoint') && null !== $data->getCreateMountpoint()) {
            $dataArray['CreateMountpoint'] = $data->getCreateMountpoint();
        }
        if ($data->isInitialized('readOnlyNonRecursive') && null !== $data->getReadOnlyNonRecursive()) {
            $dataArray['ReadOnlyNonRecursive'] = $data->getReadOnlyNonRecursive();
        }
        if ($data->isInitialized('readOnlyForceRecursive') && null !== $data->getReadOnlyForceRecursive()) {
            $dataArray['ReadOnlyForceRecursive'] = $data->getReadOnlyForceRecursive();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\MountBindOptions::class => false];
    }
}
