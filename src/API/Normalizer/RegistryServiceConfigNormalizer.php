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

final class RegistryServiceConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\RegistryServiceConfig::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\RegistryServiceConfig::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\RegistryServiceConfig();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('InsecureRegistryCIDRs', $data)) {
            $values = [];
            foreach ($data['InsecureRegistryCIDRs'] as $value) {
                $values[] = $value;
            }
            $object->setInsecureRegistryCIDRs($values);
        }
        if (\array_key_exists('IndexConfigs', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['IndexConfigs'] as $key => $value_1) {
                $values_1[$key] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\IndexInfo::class, 'json', $context);
            }
            $object->setIndexConfigs($values_1);
        }
        if (\array_key_exists('Mirrors', $data)) {
            $values_2 = [];
            foreach ($data['Mirrors'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setMirrors($values_2);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('insecureRegistryCIDRs') && null !== $data->getInsecureRegistryCIDRs()) {
            $values = [];
            foreach ($data->getInsecureRegistryCIDRs() as $value) {
                $values[] = $value;
            }
            $dataArray['InsecureRegistryCIDRs'] = $values;
        }
        if ($data->isInitialized('indexConfigs') && null !== $data->getIndexConfigs()) {
            $values_1 = [];
            foreach ($data->getIndexConfigs() as $key => $value_1) {
                $values_1[$key] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['IndexConfigs'] = $values_1;
        }
        if ($data->isInitialized('mirrors') && null !== $data->getMirrors()) {
            $values_2 = [];
            foreach ($data->getMirrors() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['Mirrors'] = $values_2;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\RegistryServiceConfig::class => false];
    }
}
