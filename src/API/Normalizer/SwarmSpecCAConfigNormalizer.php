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

final class SwarmSpecCAConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\SwarmSpecCAConfig::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\SwarmSpecCAConfig::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmSpecCAConfig();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('NodeCertExpiry', $data)) {
            $object->setNodeCertExpiry($data['NodeCertExpiry']);
        }
        if (\array_key_exists('ExternalCAs', $data)) {
            $values = [];
            foreach ($data['ExternalCAs'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\SwarmSpecCAConfigExternalCAsItem::class, 'json', $context);
            }
            $object->setExternalCAs($values);
        }
        if (\array_key_exists('SigningCACert', $data)) {
            $object->setSigningCACert($data['SigningCACert']);
        }
        if (\array_key_exists('SigningCAKey', $data)) {
            $object->setSigningCAKey($data['SigningCAKey']);
        }
        if (\array_key_exists('ForceRotate', $data)) {
            $object->setForceRotate($data['ForceRotate']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('nodeCertExpiry') && null !== $data->getNodeCertExpiry()) {
            $dataArray['NodeCertExpiry'] = $data->getNodeCertExpiry();
        }
        if ($data->isInitialized('externalCAs') && null !== $data->getExternalCAs()) {
            $values = [];
            foreach ($data->getExternalCAs() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['ExternalCAs'] = $values;
        }
        if ($data->isInitialized('signingCACert') && null !== $data->getSigningCACert()) {
            $dataArray['SigningCACert'] = $data->getSigningCACert();
        }
        if ($data->isInitialized('signingCAKey') && null !== $data->getSigningCAKey()) {
            $dataArray['SigningCAKey'] = $data->getSigningCAKey();
        }
        if ($data->isInitialized('forceRotate') && null !== $data->getForceRotate()) {
            $dataArray['ForceRotate'] = $data->getForceRotate();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SwarmSpecCAConfig::class => false];
    }
}
