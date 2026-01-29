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

final class ImageManifestSummaryNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ImageManifestSummary::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ImageManifestSummary::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ImageManifestSummary();
        if (\array_key_exists('Available', $data) && \is_int($data['Available'])) {
            $data['Available'] = (bool) $data['Available'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ID', $data)) {
            $object->setID($data['ID']);
        }
        if (\array_key_exists('Descriptor', $data)) {
            $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], \Docker\API\Model\OCIDescriptor::class, 'json', $context));
        }
        if (\array_key_exists('Available', $data)) {
            $object->setAvailable($data['Available']);
        }
        if (\array_key_exists('Size', $data)) {
            $object->setSize($this->denormalizer->denormalize($data['Size'], \Docker\API\Model\ImageManifestSummarySize::class, 'json', $context));
        }
        if (\array_key_exists('Kind', $data)) {
            $object->setKind($data['Kind']);
        }
        if (\array_key_exists('ImageData', $data) && $data['ImageData'] !== null) {
            $object->setImageData($this->denormalizer->denormalize($data['ImageData'], \Docker\API\Model\ImageManifestSummaryImageData::class, 'json', $context));
        } elseif (\array_key_exists('ImageData', $data) && $data['ImageData'] === null) {
            $object->setImageData(null);
        }
        if (\array_key_exists('AttestationData', $data) && $data['AttestationData'] !== null) {
            $object->setAttestationData($this->denormalizer->denormalize($data['AttestationData'], \Docker\API\Model\ImageManifestSummaryAttestationData::class, 'json', $context));
        } elseif (\array_key_exists('AttestationData', $data) && $data['AttestationData'] === null) {
            $object->setAttestationData(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['ID'] = $data->getID();
        $dataArray['Descriptor'] = $this->normalizer->normalize($data->getDescriptor(), 'json', $context);
        $dataArray['Available'] = $data->getAvailable();
        $dataArray['Size'] = $this->normalizer->normalize($data->getSize(), 'json', $context);
        $dataArray['Kind'] = $data->getKind();
        if ($data->isInitialized('imageData')) {
            $dataArray['ImageData'] = $this->normalizer->normalize($data->getImageData(), 'json', $context);
        }
        if ($data->isInitialized('attestationData')) {
            $dataArray['AttestationData'] = $this->normalizer->normalize($data->getAttestationData(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ImageManifestSummary::class => false];
    }
}
