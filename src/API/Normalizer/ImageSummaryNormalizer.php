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

final class ImageSummaryNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ImageSummary::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ImageSummary::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ImageSummary();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
        }
        if (\array_key_exists('ParentId', $data)) {
            $object->setParentId($data['ParentId']);
        }
        if (\array_key_exists('RepoTags', $data)) {
            $values = [];
            foreach ($data['RepoTags'] as $value) {
                $values[] = $value;
            }
            $object->setRepoTags($values);
        }
        if (\array_key_exists('RepoDigests', $data)) {
            $values_1 = [];
            foreach ($data['RepoDigests'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRepoDigests($values_1);
        }
        if (\array_key_exists('Created', $data)) {
            $object->setCreated($data['Created']);
        }
        if (\array_key_exists('Size', $data)) {
            $object->setSize($data['Size']);
        }
        if (\array_key_exists('SharedSize', $data)) {
            $object->setSharedSize($data['SharedSize']);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setLabels($values_2);
        }
        if (\array_key_exists('Containers', $data)) {
            $object->setContainers($data['Containers']);
        }
        if (\array_key_exists('Manifests', $data)) {
            $values_3 = [];
            foreach ($data['Manifests'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, \Docker\API\Model\ImageManifestSummary::class, 'json', $context);
            }
            $object->setManifests($values_3);
        }
        if (\array_key_exists('Descriptor', $data)) {
            $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], \Docker\API\Model\OCIDescriptor::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['Id'] = $data->getId();
        $dataArray['ParentId'] = $data->getParentId();
        $values = [];
        foreach ($data->getRepoTags() as $value) {
            $values[] = $value;
        }
        $dataArray['RepoTags'] = $values;
        $values_1 = [];
        foreach ($data->getRepoDigests() as $value_1) {
            $values_1[] = $value_1;
        }
        $dataArray['RepoDigests'] = $values_1;
        $dataArray['Created'] = $data->getCreated();
        $dataArray['Size'] = $data->getSize();
        $dataArray['SharedSize'] = $data->getSharedSize();
        $values_2 = [];
        foreach ($data->getLabels() as $key => $value_2) {
            $values_2[$key] = $value_2;
        }
        $dataArray['Labels'] = $values_2;
        $dataArray['Containers'] = $data->getContainers();
        if ($data->isInitialized('manifests') && null !== $data->getManifests()) {
            $values_3 = [];
            foreach ($data->getManifests() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $dataArray['Manifests'] = $values_3;
        }
        if ($data->isInitialized('descriptor') && null !== $data->getDescriptor()) {
            $dataArray['Descriptor'] = $this->normalizer->normalize($data->getDescriptor(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImageSummary::class => false];
    }
}
