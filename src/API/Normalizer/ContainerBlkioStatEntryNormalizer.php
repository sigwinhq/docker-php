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

final class ContainerBlkioStatEntryNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerBlkioStatEntry::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerBlkioStatEntry::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerBlkioStatEntry();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('major', $data)) {
            $object->setMajor($data['major']);
        }
        if (\array_key_exists('minor', $data)) {
            $object->setMinor($data['minor']);
        }
        if (\array_key_exists('op', $data)) {
            $object->setOp($data['op']);
        }
        if (\array_key_exists('value', $data)) {
            $object->setValue($data['value']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('major') && null !== $data->getMajor()) {
            $dataArray['major'] = $data->getMajor();
        }
        if ($data->isInitialized('minor') && null !== $data->getMinor()) {
            $dataArray['minor'] = $data->getMinor();
        }
        if ($data->isInitialized('op') && null !== $data->getOp()) {
            $dataArray['op'] = $data->getOp();
        }
        if ($data->isInitialized('value') && null !== $data->getValue()) {
            $dataArray['value'] = $data->getValue();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerBlkioStatEntry::class => false];
    }
}
