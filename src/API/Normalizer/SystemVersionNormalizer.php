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

final class SystemVersionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\SystemVersion::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\SystemVersion::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SystemVersion();
        if (\array_key_exists('Experimental', $data) && \is_int($data['Experimental'])) {
            $data['Experimental'] = (bool) $data['Experimental'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Platform', $data)) {
            $object->setPlatform($this->denormalizer->denormalize($data['Platform'], \Docker\API\Model\SystemVersionPlatform::class, 'json', $context));
        }
        if (\array_key_exists('Components', $data)) {
            $values = [];
            foreach ($data['Components'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\SystemVersionComponentsItem::class, 'json', $context);
            }
            $object->setComponents($values);
        }
        if (\array_key_exists('Version', $data)) {
            $object->setVersion($data['Version']);
        }
        if (\array_key_exists('ApiVersion', $data)) {
            $object->setApiVersion($data['ApiVersion']);
        }
        if (\array_key_exists('MinAPIVersion', $data)) {
            $object->setMinAPIVersion($data['MinAPIVersion']);
        }
        if (\array_key_exists('GitCommit', $data)) {
            $object->setGitCommit($data['GitCommit']);
        }
        if (\array_key_exists('GoVersion', $data)) {
            $object->setGoVersion($data['GoVersion']);
        }
        if (\array_key_exists('Os', $data)) {
            $object->setOs($data['Os']);
        }
        if (\array_key_exists('Arch', $data)) {
            $object->setArch($data['Arch']);
        }
        if (\array_key_exists('KernelVersion', $data)) {
            $object->setKernelVersion($data['KernelVersion']);
        }
        if (\array_key_exists('Experimental', $data)) {
            $object->setExperimental($data['Experimental']);
        }
        if (\array_key_exists('BuildTime', $data)) {
            $object->setBuildTime($data['BuildTime']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('platform') && null !== $data->getPlatform()) {
            $dataArray['Platform'] = $this->normalizer->normalize($data->getPlatform(), 'json', $context);
        }
        if ($data->isInitialized('components') && null !== $data->getComponents()) {
            $values = [];
            foreach ($data->getComponents() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Components'] = $values;
        }
        if ($data->isInitialized('version') && null !== $data->getVersion()) {
            $dataArray['Version'] = $data->getVersion();
        }
        if ($data->isInitialized('apiVersion') && null !== $data->getApiVersion()) {
            $dataArray['ApiVersion'] = $data->getApiVersion();
        }
        if ($data->isInitialized('minAPIVersion') && null !== $data->getMinAPIVersion()) {
            $dataArray['MinAPIVersion'] = $data->getMinAPIVersion();
        }
        if ($data->isInitialized('gitCommit') && null !== $data->getGitCommit()) {
            $dataArray['GitCommit'] = $data->getGitCommit();
        }
        if ($data->isInitialized('goVersion') && null !== $data->getGoVersion()) {
            $dataArray['GoVersion'] = $data->getGoVersion();
        }
        if ($data->isInitialized('os') && null !== $data->getOs()) {
            $dataArray['Os'] = $data->getOs();
        }
        if ($data->isInitialized('arch') && null !== $data->getArch()) {
            $dataArray['Arch'] = $data->getArch();
        }
        if ($data->isInitialized('kernelVersion') && null !== $data->getKernelVersion()) {
            $dataArray['KernelVersion'] = $data->getKernelVersion();
        }
        if ($data->isInitialized('experimental') && null !== $data->getExperimental()) {
            $dataArray['Experimental'] = $data->getExperimental();
        }
        if ($data->isInitialized('buildTime') && null !== $data->getBuildTime()) {
            $dataArray['BuildTime'] = $data->getBuildTime();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SystemVersion::class => false];
    }
}
