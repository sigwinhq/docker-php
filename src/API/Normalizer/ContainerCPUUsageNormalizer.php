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

final class ContainerCPUUsageNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerCPUUsage::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerCPUUsage::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerCPUUsage();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('total_usage', $data)) {
            $object->setTotalUsage($data['total_usage']);
        }
        if (\array_key_exists('percpu_usage', $data) && $data['percpu_usage'] !== null) {
            $values = [];
            foreach ($data['percpu_usage'] as $value) {
                $values[] = $value;
            }
            $object->setPercpuUsage($values);
        } elseif (\array_key_exists('percpu_usage', $data) && $data['percpu_usage'] === null) {
            $object->setPercpuUsage(null);
        }
        if (\array_key_exists('usage_in_kernelmode', $data)) {
            $object->setUsageInKernelmode($data['usage_in_kernelmode']);
        }
        if (\array_key_exists('usage_in_usermode', $data)) {
            $object->setUsageInUsermode($data['usage_in_usermode']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('totalUsage') && null !== $data->getTotalUsage()) {
            $dataArray['total_usage'] = $data->getTotalUsage();
        }
        if ($data->isInitialized('percpuUsage')) {
            $values = [];
            foreach ($data->getPercpuUsage() as $value) {
                $values[] = $value;
            }
            $dataArray['percpu_usage'] = $values;
        }
        if ($data->isInitialized('usageInKernelmode') && null !== $data->getUsageInKernelmode()) {
            $dataArray['usage_in_kernelmode'] = $data->getUsageInKernelmode();
        }
        if ($data->isInitialized('usageInUsermode') && null !== $data->getUsageInUsermode()) {
            $dataArray['usage_in_usermode'] = $data->getUsageInUsermode();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerCPUUsage::class => false];
    }
}
