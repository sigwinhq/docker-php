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

final class SwarmInitPostBodyNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\SwarmInitPostBody::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\SwarmInitPostBody::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SwarmInitPostBody();
        if (\array_key_exists('ForceNewCluster', $data) && \is_int($data['ForceNewCluster'])) {
            $data['ForceNewCluster'] = (bool) $data['ForceNewCluster'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('ListenAddr', $data)) {
            $object->setListenAddr($data['ListenAddr']);
        }
        if (\array_key_exists('AdvertiseAddr', $data)) {
            $object->setAdvertiseAddr($data['AdvertiseAddr']);
        }
        if (\array_key_exists('DataPathAddr', $data)) {
            $object->setDataPathAddr($data['DataPathAddr']);
        }
        if (\array_key_exists('DataPathPort', $data)) {
            $object->setDataPathPort($data['DataPathPort']);
        }
        if (\array_key_exists('DefaultAddrPool', $data)) {
            $values = [];
            foreach ($data['DefaultAddrPool'] as $value) {
                $values[] = $value;
            }
            $object->setDefaultAddrPool($values);
        }
        if (\array_key_exists('ForceNewCluster', $data)) {
            $object->setForceNewCluster($data['ForceNewCluster']);
        }
        if (\array_key_exists('SubnetSize', $data)) {
            $object->setSubnetSize($data['SubnetSize']);
        }
        if (\array_key_exists('Spec', $data)) {
            $object->setSpec($this->denormalizer->denormalize($data['Spec'], \Docker\API\Model\SwarmSpec::class, 'json', $context));
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('listenAddr') && null !== $data->getListenAddr()) {
            $dataArray['ListenAddr'] = $data->getListenAddr();
        }
        if ($data->isInitialized('advertiseAddr') && null !== $data->getAdvertiseAddr()) {
            $dataArray['AdvertiseAddr'] = $data->getAdvertiseAddr();
        }
        if ($data->isInitialized('dataPathAddr') && null !== $data->getDataPathAddr()) {
            $dataArray['DataPathAddr'] = $data->getDataPathAddr();
        }
        if ($data->isInitialized('dataPathPort') && null !== $data->getDataPathPort()) {
            $dataArray['DataPathPort'] = $data->getDataPathPort();
        }
        if ($data->isInitialized('defaultAddrPool') && null !== $data->getDefaultAddrPool()) {
            $values = [];
            foreach ($data->getDefaultAddrPool() as $value) {
                $values[] = $value;
            }
            $dataArray['DefaultAddrPool'] = $values;
        }
        if ($data->isInitialized('forceNewCluster') && null !== $data->getForceNewCluster()) {
            $dataArray['ForceNewCluster'] = $data->getForceNewCluster();
        }
        if ($data->isInitialized('subnetSize') && null !== $data->getSubnetSize()) {
            $dataArray['SubnetSize'] = $data->getSubnetSize();
        }
        if ($data->isInitialized('spec') && null !== $data->getSpec()) {
            $dataArray['Spec'] = $this->normalizer->normalize($data->getSpec(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SwarmInitPostBody::class => false];
    }
}
