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

final class ContainerCPUStatsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerCPUStats::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerCPUStats::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerCPUStats();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('cpu_usage', $data) && $data['cpu_usage'] !== null) {
            $object->setCpuUsage($this->denormalizer->denormalize($data['cpu_usage'], \Docker\API\Model\ContainerCPUUsage::class, 'json', $context));
        } elseif (\array_key_exists('cpu_usage', $data) && $data['cpu_usage'] === null) {
            $object->setCpuUsage(null);
        }
        if (\array_key_exists('system_cpu_usage', $data) && $data['system_cpu_usage'] !== null) {
            $object->setSystemCpuUsage($data['system_cpu_usage']);
        } elseif (\array_key_exists('system_cpu_usage', $data) && $data['system_cpu_usage'] === null) {
            $object->setSystemCpuUsage(null);
        }
        if (\array_key_exists('online_cpus', $data) && $data['online_cpus'] !== null) {
            $object->setOnlineCpus($data['online_cpus']);
        } elseif (\array_key_exists('online_cpus', $data) && $data['online_cpus'] === null) {
            $object->setOnlineCpus(null);
        }
        if (\array_key_exists('throttling_data', $data) && $data['throttling_data'] !== null) {
            $object->setThrottlingData($this->denormalizer->denormalize($data['throttling_data'], \Docker\API\Model\ContainerThrottlingData::class, 'json', $context));
        } elseif (\array_key_exists('throttling_data', $data) && $data['throttling_data'] === null) {
            $object->setThrottlingData(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('cpuUsage')) {
            $dataArray['cpu_usage'] = $this->normalizer->normalize($data->getCpuUsage(), 'json', $context);
        }
        if ($data->isInitialized('systemCpuUsage')) {
            $dataArray['system_cpu_usage'] = $data->getSystemCpuUsage();
        }
        if ($data->isInitialized('onlineCpus')) {
            $dataArray['online_cpus'] = $data->getOnlineCpus();
        }
        if ($data->isInitialized('throttlingData')) {
            $dataArray['throttling_data'] = $this->normalizer->normalize($data->getThrottlingData(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerCPUStats::class => false];
    }
}
