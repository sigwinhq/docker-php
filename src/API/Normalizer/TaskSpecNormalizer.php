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

final class TaskSpecNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\TaskSpec::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\TaskSpec::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpec();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('PluginSpec', $data)) {
            $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], \Docker\API\Model\TaskSpecPluginSpec::class, 'json', $context));
        }
        if (\array_key_exists('ContainerSpec', $data)) {
            $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], \Docker\API\Model\TaskSpecContainerSpec::class, 'json', $context));
        }
        if (\array_key_exists('NetworkAttachmentSpec', $data)) {
            $object->setNetworkAttachmentSpec($this->denormalizer->denormalize($data['NetworkAttachmentSpec'], \Docker\API\Model\TaskSpecNetworkAttachmentSpec::class, 'json', $context));
        }
        if (\array_key_exists('Resources', $data)) {
            $object->setResources($this->denormalizer->denormalize($data['Resources'], \Docker\API\Model\TaskSpecResources::class, 'json', $context));
        }
        if (\array_key_exists('RestartPolicy', $data)) {
            $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], \Docker\API\Model\TaskSpecRestartPolicy::class, 'json', $context));
        }
        if (\array_key_exists('Placement', $data)) {
            $object->setPlacement($this->denormalizer->denormalize($data['Placement'], \Docker\API\Model\TaskSpecPlacement::class, 'json', $context));
        }
        if (\array_key_exists('ForceUpdate', $data)) {
            $object->setForceUpdate($data['ForceUpdate']);
        }
        if (\array_key_exists('Runtime', $data)) {
            $object->setRuntime($data['Runtime']);
        }
        if (\array_key_exists('Networks', $data)) {
            $values = [];
            foreach ($data['Networks'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\NetworkAttachmentConfig::class, 'json', $context);
            }
            $object->setNetworks($values);
        }
        if (\array_key_exists('LogDriver', $data)) {
            $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], \Docker\API\Model\TaskSpecLogDriver::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('pluginSpec') && null !== $data->getPluginSpec()) {
            $dataArray['PluginSpec'] = $this->normalizer->normalize($data->getPluginSpec(), 'json', $context);
        }
        if ($data->isInitialized('containerSpec') && null !== $data->getContainerSpec()) {
            $dataArray['ContainerSpec'] = $this->normalizer->normalize($data->getContainerSpec(), 'json', $context);
        }
        if ($data->isInitialized('networkAttachmentSpec') && null !== $data->getNetworkAttachmentSpec()) {
            $dataArray['NetworkAttachmentSpec'] = $this->normalizer->normalize($data->getNetworkAttachmentSpec(), 'json', $context);
        }
        if ($data->isInitialized('resources') && null !== $data->getResources()) {
            $dataArray['Resources'] = $this->normalizer->normalize($data->getResources(), 'json', $context);
        }
        if ($data->isInitialized('restartPolicy') && null !== $data->getRestartPolicy()) {
            $dataArray['RestartPolicy'] = $this->normalizer->normalize($data->getRestartPolicy(), 'json', $context);
        }
        if ($data->isInitialized('placement') && null !== $data->getPlacement()) {
            $dataArray['Placement'] = $this->normalizer->normalize($data->getPlacement(), 'json', $context);
        }
        if ($data->isInitialized('forceUpdate') && null !== $data->getForceUpdate()) {
            $dataArray['ForceUpdate'] = $data->getForceUpdate();
        }
        if ($data->isInitialized('runtime') && null !== $data->getRuntime()) {
            $dataArray['Runtime'] = $data->getRuntime();
        }
        if ($data->isInitialized('networks') && null !== $data->getNetworks()) {
            $values = [];
            foreach ($data->getNetworks() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Networks'] = $values;
        }
        if ($data->isInitialized('logDriver') && null !== $data->getLogDriver()) {
            $dataArray['LogDriver'] = $this->normalizer->normalize($data->getLogDriver(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpec::class => false];
    }
}
