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

final class OCIDescriptorNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\OCIDescriptor::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\OCIDescriptor::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\OCIDescriptor();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('mediaType', $data)) {
            $object->setMediaType($data['mediaType']);
        }
        if (\array_key_exists('digest', $data)) {
            $object->setDigest($data['digest']);
        }
        if (\array_key_exists('size', $data)) {
            $object->setSize($data['size']);
        }
        if (\array_key_exists('urls', $data) && $data['urls'] !== null) {
            $values = [];
            foreach ($data['urls'] as $value) {
                $values[] = $value;
            }
            $object->setUrls($values);
        } elseif (\array_key_exists('urls', $data) && $data['urls'] === null) {
            $object->setUrls(null);
        }
        if (\array_key_exists('annotations', $data) && $data['annotations'] !== null) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['annotations'] as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $object->setAnnotations($values_1);
        } elseif (\array_key_exists('annotations', $data) && $data['annotations'] === null) {
            $object->setAnnotations(null);
        }
        if (\array_key_exists('data', $data) && $data['data'] !== null) {
            $object->setData($data['data']);
        } elseif (\array_key_exists('data', $data) && $data['data'] === null) {
            $object->setData(null);
        }
        if (\array_key_exists('platform', $data) && $data['platform'] !== null) {
            $object->setPlatform($this->denormalizer->denormalize($data['platform'], \Docker\API\Model\OCIPlatform::class, 'json', $context));
        } elseif (\array_key_exists('platform', $data) && $data['platform'] === null) {
            $object->setPlatform(null);
        }
        if (\array_key_exists('artifactType', $data) && $data['artifactType'] !== null) {
            $object->setArtifactType($data['artifactType']);
        } elseif (\array_key_exists('artifactType', $data) && $data['artifactType'] === null) {
            $object->setArtifactType(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('mediaType') && null !== $data->getMediaType()) {
            $dataArray['mediaType'] = $data->getMediaType();
        }
        if ($data->isInitialized('digest') && null !== $data->getDigest()) {
            $dataArray['digest'] = $data->getDigest();
        }
        if ($data->isInitialized('size') && null !== $data->getSize()) {
            $dataArray['size'] = $data->getSize();
        }
        if ($data->isInitialized('urls')) {
            $values = [];
            foreach ($data->getUrls() as $value) {
                $values[] = $value;
            }
            $dataArray['urls'] = $values;
        }
        if ($data->isInitialized('annotations')) {
            $values_1 = [];
            foreach ($data->getAnnotations() as $key => $value_1) {
                $values_1[$key] = $value_1;
            }
            $dataArray['annotations'] = $values_1;
        }
        if ($data->isInitialized('data')) {
            $dataArray['data'] = $data->getData();
        }
        if ($data->isInitialized('platform')) {
            $dataArray['platform'] = $this->normalizer->normalize($data->getPlatform(), 'json', $context);
        }
        if ($data->isInitialized('artifactType')) {
            $dataArray['artifactType'] = $data->getArtifactType();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\OCIDescriptor::class => false];
    }
}
