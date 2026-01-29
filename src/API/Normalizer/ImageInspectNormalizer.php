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

final class ImageInspectNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ImageInspect::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ImageInspect::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ImageInspect();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
        }
        if (\array_key_exists('Descriptor', $data)) {
            $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], \Docker\API\Model\OCIDescriptor::class, 'json', $context));
        }
        if (\array_key_exists('Manifests', $data) && $data['Manifests'] !== null) {
            $values = [];
            foreach ($data['Manifests'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\ImageManifestSummary::class, 'json', $context);
            }
            $object->setManifests($values);
        } elseif (\array_key_exists('Manifests', $data) && $data['Manifests'] === null) {
            $object->setManifests(null);
        }
        if (\array_key_exists('Identity', $data)) {
            $object->setIdentity($this->denormalizer->denormalize($data['Identity'], \Docker\API\Model\Identity::class, 'json', $context));
        }
        if (\array_key_exists('RepoTags', $data)) {
            $values_1 = [];
            foreach ($data['RepoTags'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRepoTags($values_1);
        }
        if (\array_key_exists('RepoDigests', $data)) {
            $values_2 = [];
            foreach ($data['RepoDigests'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setRepoDigests($values_2);
        }
        if (\array_key_exists('Comment', $data) && $data['Comment'] !== null) {
            $object->setComment($data['Comment']);
        } elseif (\array_key_exists('Comment', $data) && $data['Comment'] === null) {
            $object->setComment(null);
        }
        if (\array_key_exists('Created', $data) && $data['Created'] !== null) {
            $object->setCreated($data['Created']);
        } elseif (\array_key_exists('Created', $data) && $data['Created'] === null) {
            $object->setCreated(null);
        }
        if (\array_key_exists('Author', $data) && $data['Author'] !== null) {
            $object->setAuthor($data['Author']);
        } elseif (\array_key_exists('Author', $data) && $data['Author'] === null) {
            $object->setAuthor(null);
        }
        if (\array_key_exists('Config', $data)) {
            $object->setConfig($this->denormalizer->denormalize($data['Config'], \Docker\API\Model\ImageConfig::class, 'json', $context));
        }
        if (\array_key_exists('Architecture', $data)) {
            $object->setArchitecture($data['Architecture']);
        }
        if (\array_key_exists('Variant', $data) && $data['Variant'] !== null) {
            $object->setVariant($data['Variant']);
        } elseif (\array_key_exists('Variant', $data) && $data['Variant'] === null) {
            $object->setVariant(null);
        }
        if (\array_key_exists('Os', $data)) {
            $object->setOs($data['Os']);
        }
        if (\array_key_exists('OsVersion', $data) && $data['OsVersion'] !== null) {
            $object->setOsVersion($data['OsVersion']);
        } elseif (\array_key_exists('OsVersion', $data) && $data['OsVersion'] === null) {
            $object->setOsVersion(null);
        }
        if (\array_key_exists('Size', $data)) {
            $object->setSize($data['Size']);
        }
        if (\array_key_exists('GraphDriver', $data)) {
            $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], \Docker\API\Model\DriverData::class, 'json', $context));
        }
        if (\array_key_exists('RootFS', $data)) {
            $object->setRootFS($this->denormalizer->denormalize($data['RootFS'], \Docker\API\Model\ImageInspectRootFS::class, 'json', $context));
        }
        if (\array_key_exists('Metadata', $data)) {
            $object->setMetadata($this->denormalizer->denormalize($data['Metadata'], \Docker\API\Model\ImageInspectMetadata::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['Id'] = $data->getId();
        }
        if ($data->isInitialized('descriptor') && null !== $data->getDescriptor()) {
            $dataArray['Descriptor'] = $this->normalizer->normalize($data->getDescriptor(), 'json', $context);
        }
        if ($data->isInitialized('manifests')) {
            $values = [];
            foreach ($data->getManifests() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Manifests'] = $values;
        }
        if ($data->isInitialized('identity') && null !== $data->getIdentity()) {
            $dataArray['Identity'] = $this->normalizer->normalize($data->getIdentity(), 'json', $context);
        }
        if ($data->isInitialized('repoTags') && null !== $data->getRepoTags()) {
            $values_1 = [];
            foreach ($data->getRepoTags() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['RepoTags'] = $values_1;
        }
        if ($data->isInitialized('repoDigests') && null !== $data->getRepoDigests()) {
            $values_2 = [];
            foreach ($data->getRepoDigests() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['RepoDigests'] = $values_2;
        }
        if ($data->isInitialized('comment')) {
            $dataArray['Comment'] = $data->getComment();
        }
        if ($data->isInitialized('created')) {
            $dataArray['Created'] = $data->getCreated();
        }
        if ($data->isInitialized('author')) {
            $dataArray['Author'] = $data->getAuthor();
        }
        if ($data->isInitialized('config') && null !== $data->getConfig()) {
            $dataArray['Config'] = $this->normalizer->normalize($data->getConfig(), 'json', $context);
        }
        if ($data->isInitialized('architecture') && null !== $data->getArchitecture()) {
            $dataArray['Architecture'] = $data->getArchitecture();
        }
        if ($data->isInitialized('variant')) {
            $dataArray['Variant'] = $data->getVariant();
        }
        if ($data->isInitialized('os') && null !== $data->getOs()) {
            $dataArray['Os'] = $data->getOs();
        }
        if ($data->isInitialized('osVersion')) {
            $dataArray['OsVersion'] = $data->getOsVersion();
        }
        if ($data->isInitialized('size') && null !== $data->getSize()) {
            $dataArray['Size'] = $data->getSize();
        }
        if ($data->isInitialized('graphDriver') && null !== $data->getGraphDriver()) {
            $dataArray['GraphDriver'] = $this->normalizer->normalize($data->getGraphDriver(), 'json', $context);
        }
        if ($data->isInitialized('rootFS') && null !== $data->getRootFS()) {
            $dataArray['RootFS'] = $this->normalizer->normalize($data->getRootFS(), 'json', $context);
        }
        if ($data->isInitialized('metadata') && null !== $data->getMetadata()) {
            $dataArray['Metadata'] = $this->normalizer->normalize($data->getMetadata(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImageInspect::class => false];
    }
}
