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

final class ServiceInfoNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ServiceInfo::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ServiceInfo::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ServiceInfo();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('VIP', $data)) {
            $object->setVIP($data['VIP']);
        }
        if (\array_key_exists('Ports', $data)) {
            $values = [];
            foreach ($data['Ports'] as $value) {
                $values[] = $value;
            }
            $object->setPorts($values);
        }
        if (\array_key_exists('LocalLBIndex', $data)) {
            $object->setLocalLBIndex($data['LocalLBIndex']);
        }
        if (\array_key_exists('Tasks', $data)) {
            $values_1 = [];
            foreach ($data['Tasks'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\NetworkTaskInfo::class, 'json', $context);
            }
            $object->setTasks($values_1);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('vIP') && null !== $data->getVIP()) {
            $dataArray['VIP'] = $data->getVIP();
        }
        if ($data->isInitialized('ports') && null !== $data->getPorts()) {
            $values = [];
            foreach ($data->getPorts() as $value) {
                $values[] = $value;
            }
            $dataArray['Ports'] = $values;
        }
        if ($data->isInitialized('localLBIndex') && null !== $data->getLocalLBIndex()) {
            $dataArray['LocalLBIndex'] = $data->getLocalLBIndex();
        }
        if ($data->isInitialized('tasks') && null !== $data->getTasks()) {
            $values_1 = [];
            foreach ($data->getTasks() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $dataArray['Tasks'] = $values_1;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ServiceInfo::class => false];
    }
}
