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

final class PluginConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\PluginConfig::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\PluginConfig::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\PluginConfig();
        if (\array_key_exists('IpcHost', $data) && \is_int($data['IpcHost'])) {
            $data['IpcHost'] = (bool) $data['IpcHost'];
        }
        if (\array_key_exists('PidHost', $data) && \is_int($data['PidHost'])) {
            $data['PidHost'] = (bool) $data['PidHost'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Description', $data)) {
            $object->setDescription($data['Description']);
        }
        if (\array_key_exists('Documentation', $data)) {
            $object->setDocumentation($data['Documentation']);
        }
        if (\array_key_exists('Interface', $data)) {
            $object->setInterface($this->denormalizer->denormalize($data['Interface'], \Docker\API\Model\PluginConfigInterface::class, 'json', $context));
        }
        if (\array_key_exists('Entrypoint', $data)) {
            $values = [];
            foreach ($data['Entrypoint'] as $value) {
                $values[] = $value;
            }
            $object->setEntrypoint($values);
        }
        if (\array_key_exists('WorkDir', $data)) {
            $object->setWorkDir($data['WorkDir']);
        }
        if (\array_key_exists('User', $data)) {
            $object->setUser($this->denormalizer->denormalize($data['User'], \Docker\API\Model\PluginConfigUser::class, 'json', $context));
        }
        if (\array_key_exists('Network', $data)) {
            $object->setNetwork($this->denormalizer->denormalize($data['Network'], \Docker\API\Model\PluginConfigNetwork::class, 'json', $context));
        }
        if (\array_key_exists('Linux', $data)) {
            $object->setLinux($this->denormalizer->denormalize($data['Linux'], \Docker\API\Model\PluginConfigLinux::class, 'json', $context));
        }
        if (\array_key_exists('PropagatedMount', $data)) {
            $object->setPropagatedMount($data['PropagatedMount']);
        }
        if (\array_key_exists('IpcHost', $data)) {
            $object->setIpcHost($data['IpcHost']);
        }
        if (\array_key_exists('PidHost', $data)) {
            $object->setPidHost($data['PidHost']);
        }
        if (\array_key_exists('Mounts', $data)) {
            $values_1 = [];
            foreach ($data['Mounts'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, \Docker\API\Model\PluginMount::class, 'json', $context);
            }
            $object->setMounts($values_1);
        }
        if (\array_key_exists('Env', $data)) {
            $values_2 = [];
            foreach ($data['Env'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, \Docker\API\Model\PluginEnv::class, 'json', $context);
            }
            $object->setEnv($values_2);
        }
        if (\array_key_exists('Args', $data)) {
            $object->setArgs($this->denormalizer->denormalize($data['Args'], \Docker\API\Model\PluginConfigArgs::class, 'json', $context));
        }
        if (\array_key_exists('rootfs', $data)) {
            $object->setRootfs($this->denormalizer->denormalize($data['rootfs'], \Docker\API\Model\PluginConfigRootfs::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['Description'] = $data->getDescription();
        $dataArray['Documentation'] = $data->getDocumentation();
        $dataArray['Interface'] = $this->normalizer->normalize($data->getInterface(), 'json', $context);
        $values = [];
        foreach ($data->getEntrypoint() as $value) {
            $values[] = $value;
        }
        $dataArray['Entrypoint'] = $values;
        $dataArray['WorkDir'] = $data->getWorkDir();
        if ($data->isInitialized('user') && null !== $data->getUser()) {
            $dataArray['User'] = $this->normalizer->normalize($data->getUser(), 'json', $context);
        }
        $dataArray['Network'] = $this->normalizer->normalize($data->getNetwork(), 'json', $context);
        $dataArray['Linux'] = $this->normalizer->normalize($data->getLinux(), 'json', $context);
        $dataArray['PropagatedMount'] = $data->getPropagatedMount();
        $dataArray['IpcHost'] = $data->getIpcHost();
        $dataArray['PidHost'] = $data->getPidHost();
        $values_1 = [];
        foreach ($data->getMounts() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $dataArray['Mounts'] = $values_1;
        $values_2 = [];
        foreach ($data->getEnv() as $value_2) {
            $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
        }
        $dataArray['Env'] = $values_2;
        $dataArray['Args'] = $this->normalizer->normalize($data->getArgs(), 'json', $context);
        if ($data->isInitialized('rootfs') && null !== $data->getRootfs()) {
            $dataArray['rootfs'] = $this->normalizer->normalize($data->getRootfs(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\PluginConfig::class => false];
    }
}
