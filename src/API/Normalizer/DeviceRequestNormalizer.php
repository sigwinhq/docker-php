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

final class DeviceRequestNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\DeviceRequest::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\DeviceRequest::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\DeviceRequest();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
        }
        if (\array_key_exists('Count', $data)) {
            $object->setCount($data['Count']);
        }
        if (\array_key_exists('DeviceIDs', $data)) {
            $values = [];
            foreach ($data['DeviceIDs'] as $value) {
                $values[] = $value;
            }
            $object->setDeviceIDs($values);
        }
        if (\array_key_exists('Capabilities', $data)) {
            $values_1 = [];
            foreach ($data['Capabilities'] as $value_1) {
                $values_2 = [];
                foreach ($value_1 as $value_2) {
                    $values_2[] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $object->setCapabilities($values_1);
        }
        if (\array_key_exists('Options', $data)) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key => $value_3) {
                $values_3[$key] = $value_3;
            }
            $object->setOptions($values_3);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('count') && null !== $data->getCount()) {
            $dataArray['Count'] = $data->getCount();
        }
        if ($data->isInitialized('deviceIDs') && null !== $data->getDeviceIDs()) {
            $values = [];
            foreach ($data->getDeviceIDs() as $value) {
                $values[] = $value;
            }
            $dataArray['DeviceIDs'] = $values;
        }
        if ($data->isInitialized('capabilities') && null !== $data->getCapabilities()) {
            $values_1 = [];
            foreach ($data->getCapabilities() as $value_1) {
                $values_2 = [];
                foreach ($value_1 as $value_2) {
                    $values_2[] = $value_2;
                }
                $values_1[] = $values_2;
            }
            $dataArray['Capabilities'] = $values_1;
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $values_3 = [];
            foreach ($data->getOptions() as $key => $value_3) {
                $values_3[$key] = $value_3;
            }
            $dataArray['Options'] = $values_3;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\DeviceRequest::class => false];
    }
}
