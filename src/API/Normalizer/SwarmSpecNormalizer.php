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

final class SwarmSpecNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\SwarmSpec::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\SwarmSpec::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmSpec();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLabels($values);
        }
        if (\array_key_exists('Orchestration', $data) && $data['Orchestration'] !== null) {
            $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], \Docker\API\Model\SwarmSpecOrchestration::class, 'json', $context));
        } elseif (\array_key_exists('Orchestration', $data) && $data['Orchestration'] === null) {
            $object->setOrchestration(null);
        }
        if (\array_key_exists('Raft', $data)) {
            $object->setRaft($this->denormalizer->denormalize($data['Raft'], \Docker\API\Model\SwarmSpecRaft::class, 'json', $context));
        }
        if (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] !== null) {
            $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], \Docker\API\Model\SwarmSpecDispatcher::class, 'json', $context));
        } elseif (\array_key_exists('Dispatcher', $data) && $data['Dispatcher'] === null) {
            $object->setDispatcher(null);
        }
        if (\array_key_exists('CAConfig', $data) && $data['CAConfig'] !== null) {
            $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], \Docker\API\Model\SwarmSpecCAConfig::class, 'json', $context));
        } elseif (\array_key_exists('CAConfig', $data) && $data['CAConfig'] === null) {
            $object->setCAConfig(null);
        }
        if (\array_key_exists('EncryptionConfig', $data)) {
            $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], \Docker\API\Model\SwarmSpecEncryptionConfig::class, 'json', $context));
        }
        if (\array_key_exists('TaskDefaults', $data)) {
            $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], \Docker\API\Model\SwarmSpecTaskDefaults::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values = [];
            foreach ($data->getLabels() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['Labels'] = $values;
        }
        if ($data->isInitialized('orchestration')) {
            $dataArray['Orchestration'] = $this->normalizer->normalize($data->getOrchestration(), 'json', $context);
        }
        if ($data->isInitialized('raft') && null !== $data->getRaft()) {
            $dataArray['Raft'] = $this->normalizer->normalize($data->getRaft(), 'json', $context);
        }
        if ($data->isInitialized('dispatcher')) {
            $dataArray['Dispatcher'] = $this->normalizer->normalize($data->getDispatcher(), 'json', $context);
        }
        if ($data->isInitialized('cAConfig')) {
            $dataArray['CAConfig'] = $this->normalizer->normalize($data->getCAConfig(), 'json', $context);
        }
        if ($data->isInitialized('encryptionConfig') && null !== $data->getEncryptionConfig()) {
            $dataArray['EncryptionConfig'] = $this->normalizer->normalize($data->getEncryptionConfig(), 'json', $context);
        }
        if ($data->isInitialized('taskDefaults') && null !== $data->getTaskDefaults()) {
            $dataArray['TaskDefaults'] = $this->normalizer->normalize($data->getTaskDefaults(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SwarmSpec::class => false];
    }
}
