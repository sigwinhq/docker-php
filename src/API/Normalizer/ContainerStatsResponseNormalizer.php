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

final class ContainerStatsResponseNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerStatsResponse::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerStatsResponse::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerStatsResponse();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && $data['id'] !== null) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && $data['id'] === null) {
            $object->setId(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        } elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('os_type', $data) && $data['os_type'] !== null) {
            $object->setOsType($data['os_type']);
        } elseif (\array_key_exists('os_type', $data) && $data['os_type'] === null) {
            $object->setOsType(null);
        }
        if (\array_key_exists('read', $data)) {
            $object->setRead(\DateTimeImmutable::createFromFormat('Y-m-d\TH:i:sP', $data['read']));
        }
        if (\array_key_exists('cpu_stats', $data) && $data['cpu_stats'] !== null) {
            $object->setCpuStats($this->denormalizer->denormalize($data['cpu_stats'], \Docker\API\Model\ContainerCPUStats::class, 'json', $context));
        } elseif (\array_key_exists('cpu_stats', $data) && $data['cpu_stats'] === null) {
            $object->setCpuStats(null);
        }
        if (\array_key_exists('memory_stats', $data)) {
            $object->setMemoryStats($this->denormalizer->denormalize($data['memory_stats'], \Docker\API\Model\ContainerMemoryStats::class, 'json', $context));
        }
        if (\array_key_exists('networks', $data) && $data['networks'] !== null) {
            $object->setNetworks($data['networks']);
        } elseif (\array_key_exists('networks', $data) && $data['networks'] === null) {
            $object->setNetworks(null);
        }
        if (\array_key_exists('pids_stats', $data) && $data['pids_stats'] !== null) {
            $object->setPidsStats($this->denormalizer->denormalize($data['pids_stats'], \Docker\API\Model\ContainerPidsStats::class, 'json', $context));
        } elseif (\array_key_exists('pids_stats', $data) && $data['pids_stats'] === null) {
            $object->setPidsStats(null);
        }
        if (\array_key_exists('blkio_stats', $data) && $data['blkio_stats'] !== null) {
            $object->setBlkioStats($this->denormalizer->denormalize($data['blkio_stats'], \Docker\API\Model\ContainerBlkioStats::class, 'json', $context));
        } elseif (\array_key_exists('blkio_stats', $data) && $data['blkio_stats'] === null) {
            $object->setBlkioStats(null);
        }
        if (\array_key_exists('num_procs', $data)) {
            $object->setNumProcs($data['num_procs']);
        }
        if (\array_key_exists('storage_stats', $data) && $data['storage_stats'] !== null) {
            $object->setStorageStats($this->denormalizer->denormalize($data['storage_stats'], \Docker\API\Model\ContainerStorageStats::class, 'json', $context));
        } elseif (\array_key_exists('storage_stats', $data) && $data['storage_stats'] === null) {
            $object->setStorageStats(null);
        }
        if (\array_key_exists('preread', $data)) {
            $object->setPreread(\DateTimeImmutable::createFromFormat('Y-m-d\TH:i:sP', $data['preread']));
        }
        if (\array_key_exists('precpu_stats', $data) && $data['precpu_stats'] !== null) {
            $object->setPrecpuStats($this->denormalizer->denormalize($data['precpu_stats'], \Docker\API\Model\ContainerCPUStats::class, 'json', $context));
        } elseif (\array_key_exists('precpu_stats', $data) && $data['precpu_stats'] === null) {
            $object->setPrecpuStats(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('id')) {
            $dataArray['id'] = $data->getId();
        }
        if ($data->isInitialized('name')) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('osType')) {
            $dataArray['os_type'] = $data->getOsType();
        }
        if ($data->isInitialized('read') && null !== $data->getRead()) {
            $dataArray['read'] = $data->getRead()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('cpuStats')) {
            $dataArray['cpu_stats'] = $this->normalizer->normalize($data->getCpuStats(), 'json', $context);
        }
        if ($data->isInitialized('memoryStats') && null !== $data->getMemoryStats()) {
            $dataArray['memory_stats'] = $this->normalizer->normalize($data->getMemoryStats(), 'json', $context);
        }
        if ($data->isInitialized('networks')) {
            $dataArray['networks'] = $data->getNetworks();
        }
        if ($data->isInitialized('pidsStats')) {
            $dataArray['pids_stats'] = $this->normalizer->normalize($data->getPidsStats(), 'json', $context);
        }
        if ($data->isInitialized('blkioStats')) {
            $dataArray['blkio_stats'] = $this->normalizer->normalize($data->getBlkioStats(), 'json', $context);
        }
        if ($data->isInitialized('numProcs') && null !== $data->getNumProcs()) {
            $dataArray['num_procs'] = $data->getNumProcs();
        }
        if ($data->isInitialized('storageStats')) {
            $dataArray['storage_stats'] = $this->normalizer->normalize($data->getStorageStats(), 'json', $context);
        }
        if ($data->isInitialized('preread') && null !== $data->getPreread()) {
            $dataArray['preread'] = $data->getPreread()->format('Y-m-d\TH:i:sP');
        }
        if ($data->isInitialized('precpuStats')) {
            $dataArray['precpu_stats'] = $this->normalizer->normalize($data->getPrecpuStats(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerStatsResponse::class => false];
    }
}
