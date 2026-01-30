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

final class ContainerMemoryStatsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerMemoryStats::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerMemoryStats::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerMemoryStats();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('usage', $data) && $data['usage'] !== null) {
            $object->setUsage($data['usage']);
        } elseif (\array_key_exists('usage', $data) && $data['usage'] === null) {
            $object->setUsage(null);
        }
        if (\array_key_exists('max_usage', $data) && $data['max_usage'] !== null) {
            $object->setMaxUsage($data['max_usage']);
        } elseif (\array_key_exists('max_usage', $data) && $data['max_usage'] === null) {
            $object->setMaxUsage(null);
        }
        if (\array_key_exists('stats', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['stats'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setStats($values);
        }
        if (\array_key_exists('failcnt', $data) && $data['failcnt'] !== null) {
            $object->setFailcnt($data['failcnt']);
        } elseif (\array_key_exists('failcnt', $data) && $data['failcnt'] === null) {
            $object->setFailcnt(null);
        }
        if (\array_key_exists('limit', $data) && $data['limit'] !== null) {
            $object->setLimit($data['limit']);
        } elseif (\array_key_exists('limit', $data) && $data['limit'] === null) {
            $object->setLimit(null);
        }
        if (\array_key_exists('commitbytes', $data) && $data['commitbytes'] !== null) {
            $object->setCommitbytes($data['commitbytes']);
        } elseif (\array_key_exists('commitbytes', $data) && $data['commitbytes'] === null) {
            $object->setCommitbytes(null);
        }
        if (\array_key_exists('commitpeakbytes', $data) && $data['commitpeakbytes'] !== null) {
            $object->setCommitpeakbytes($data['commitpeakbytes']);
        } elseif (\array_key_exists('commitpeakbytes', $data) && $data['commitpeakbytes'] === null) {
            $object->setCommitpeakbytes(null);
        }
        if (\array_key_exists('privateworkingset', $data) && $data['privateworkingset'] !== null) {
            $object->setPrivateworkingset($data['privateworkingset']);
        } elseif (\array_key_exists('privateworkingset', $data) && $data['privateworkingset'] === null) {
            $object->setPrivateworkingset(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('usage')) {
            $dataArray['usage'] = $data->getUsage();
        }
        if ($data->isInitialized('maxUsage')) {
            $dataArray['max_usage'] = $data->getMaxUsage();
        }
        if ($data->isInitialized('stats') && null !== $data->getStats()) {
            $values = [];
            foreach ($data->getStats() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['stats'] = $values;
        }
        if ($data->isInitialized('failcnt')) {
            $dataArray['failcnt'] = $data->getFailcnt();
        }
        if ($data->isInitialized('limit')) {
            $dataArray['limit'] = $data->getLimit();
        }
        if ($data->isInitialized('commitbytes')) {
            $dataArray['commitbytes'] = $data->getCommitbytes();
        }
        if ($data->isInitialized('commitpeakbytes')) {
            $dataArray['commitpeakbytes'] = $data->getCommitpeakbytes();
        }
        if ($data->isInitialized('privateworkingset')) {
            $dataArray['privateworkingset'] = $data->getPrivateworkingset();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerMemoryStats::class => false];
    }
}
