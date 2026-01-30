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

final class TaskSpecResourcesNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\TaskSpecResources::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\TaskSpecResources::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecResources();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Limits', $data)) {
            $object->setLimits($this->denormalizer->denormalize($data['Limits'], \Docker\API\Model\Limit::class, 'json', $context));
        }
        if (\array_key_exists('Reservations', $data)) {
            $object->setReservations($this->denormalizer->denormalize($data['Reservations'], \Docker\API\Model\ResourceObject::class, 'json', $context));
        }
        if (\array_key_exists('SwapBytes', $data) && $data['SwapBytes'] !== null) {
            $object->setSwapBytes($data['SwapBytes']);
        } elseif (\array_key_exists('SwapBytes', $data) && $data['SwapBytes'] === null) {
            $object->setSwapBytes(null);
        }
        if (\array_key_exists('MemorySwappiness', $data) && $data['MemorySwappiness'] !== null) {
            $object->setMemorySwappiness($data['MemorySwappiness']);
        } elseif (\array_key_exists('MemorySwappiness', $data) && $data['MemorySwappiness'] === null) {
            $object->setMemorySwappiness(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('limits') && null !== $data->getLimits()) {
            $dataArray['Limits'] = $this->normalizer->normalize($data->getLimits(), 'json', $context);
        }
        if ($data->isInitialized('reservations') && null !== $data->getReservations()) {
            $dataArray['Reservations'] = $this->normalizer->normalize($data->getReservations(), 'json', $context);
        }
        if ($data->isInitialized('swapBytes')) {
            $dataArray['SwapBytes'] = $data->getSwapBytes();
        }
        if ($data->isInitialized('memorySwappiness')) {
            $dataArray['MemorySwappiness'] = $data->getMemorySwappiness();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpecResources::class => false];
    }
}
