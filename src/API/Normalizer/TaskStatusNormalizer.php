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

final class TaskStatusNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\TaskStatus::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\TaskStatus::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskStatus();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Timestamp', $data)) {
            $object->setTimestamp($data['Timestamp']);
        }
        if (\array_key_exists('State', $data)) {
            $object->setState($data['State']);
        }
        if (\array_key_exists('Message', $data)) {
            $object->setMessage($data['Message']);
        }
        if (\array_key_exists('Err', $data)) {
            $object->setErr($data['Err']);
        }
        if (\array_key_exists('ContainerStatus', $data)) {
            $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], \Docker\API\Model\ContainerStatus::class, 'json', $context));
        }
        if (\array_key_exists('PortStatus', $data)) {
            $object->setPortStatus($this->denormalizer->denormalize($data['PortStatus'], \Docker\API\Model\PortStatus::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('timestamp') && null !== $data->getTimestamp()) {
            $dataArray['Timestamp'] = $data->getTimestamp();
        }
        if ($data->isInitialized('state') && null !== $data->getState()) {
            $dataArray['State'] = $data->getState();
        }
        if ($data->isInitialized('message') && null !== $data->getMessage()) {
            $dataArray['Message'] = $data->getMessage();
        }
        if ($data->isInitialized('err') && null !== $data->getErr()) {
            $dataArray['Err'] = $data->getErr();
        }
        if ($data->isInitialized('containerStatus') && null !== $data->getContainerStatus()) {
            $dataArray['ContainerStatus'] = $this->normalizer->normalize($data->getContainerStatus(), 'json', $context);
        }
        if ($data->isInitialized('portStatus') && null !== $data->getPortStatus()) {
            $dataArray['PortStatus'] = $this->normalizer->normalize($data->getPortStatus(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskStatus::class => false];
    }
}
