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

final class NetworkSettingsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\NetworkSettings::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\NetworkSettings::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\NetworkSettings();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('SandboxID', $data)) {
            $object->setSandboxID($data['SandboxID']);
        }
        if (\array_key_exists('SandboxKey', $data)) {
            $object->setSandboxKey($data['SandboxKey']);
        }
        if (\array_key_exists('Ports', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Ports'] as $key => $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\PortBinding::class, 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $object->setPorts($values);
        }
        if (\array_key_exists('Networks', $data)) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Networks'] as $key_1 => $value_2) {
                $values_2[$key_1] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\EndpointSettings::class, 'json', $context);
            }
            $object->setNetworks($values_2);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('sandboxID') && null !== $data->getSandboxID()) {
            $dataArray['SandboxID'] = $data->getSandboxID();
        }
        if ($data->isInitialized('sandboxKey') && null !== $data->getSandboxKey()) {
            $dataArray['SandboxKey'] = $data->getSandboxKey();
        }
        if ($data->isInitialized('ports') && null !== $data->getPorts()) {
            $values = [];
            foreach ($data->getPorts() as $key => $value) {
                $values_1 = [];
                foreach ($value as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $values[$key] = $values_1;
            }
            $dataArray['Ports'] = $values;
        }
        if ($data->isInitialized('networks') && null !== $data->getNetworks()) {
            $values_2 = [];
            foreach ($data->getNetworks() as $key_1 => $value_2) {
                $values_2[$key_1] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $dataArray['Networks'] = $values_2;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\NetworkSettings::class => false];
    }
}
