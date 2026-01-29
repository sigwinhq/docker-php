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

final class NetworkInspectNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\NetworkInspect::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\NetworkInspect::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\NetworkInspect();
        if (\array_key_exists('EnableIPv4', $data) && \is_int($data['EnableIPv4'])) {
            $data['EnableIPv4'] = (bool) $data['EnableIPv4'];
        }
        if (\array_key_exists('EnableIPv6', $data) && \is_int($data['EnableIPv6'])) {
            $data['EnableIPv6'] = (bool) $data['EnableIPv6'];
        }
        if (\array_key_exists('Internal', $data) && \is_int($data['Internal'])) {
            $data['Internal'] = (bool) $data['Internal'];
        }
        if (\array_key_exists('Attachable', $data) && \is_int($data['Attachable'])) {
            $data['Attachable'] = (bool) $data['Attachable'];
        }
        if (\array_key_exists('Ingress', $data) && \is_int($data['Ingress'])) {
            $data['Ingress'] = (bool) $data['Ingress'];
        }
        if (\array_key_exists('ConfigOnly', $data) && \is_int($data['ConfigOnly'])) {
            $data['ConfigOnly'] = (bool) $data['ConfigOnly'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Containers', $data)) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Containers'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, \Docker\API\Model\EndpointResource::class, 'json', $context);
            }
            $object->setContainers($values);
        }
        if (\array_key_exists('Services', $data)) {
            $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Services'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setServices($values_1);
        }
        if (\array_key_exists('Status', $data)) {
            $object->setStatus($this->denormalizer->denormalize($data['Status'], \Docker\API\Model\NetworkStatus::class, 'json', $context));
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
        }
        if (\array_key_exists('Id', $data)) {
            $object->setId($data['Id']);
        }
        if (\array_key_exists('Created', $data)) {
            $object->setCreated($data['Created']);
        }
        if (\array_key_exists('Scope', $data)) {
            $object->setScope($data['Scope']);
        }
        if (\array_key_exists('Driver', $data)) {
            $object->setDriver($data['Driver']);
        }
        if (\array_key_exists('EnableIPv4', $data)) {
            $object->setEnableIPv4($data['EnableIPv4']);
        }
        if (\array_key_exists('EnableIPv6', $data)) {
            $object->setEnableIPv6($data['EnableIPv6']);
        }
        if (\array_key_exists('IPAM', $data)) {
            $object->setIPAM($this->denormalizer->denormalize($data['IPAM'], \Docker\API\Model\IPAM::class, 'json', $context));
        }
        if (\array_key_exists('Internal', $data)) {
            $object->setInternal($data['Internal']);
        }
        if (\array_key_exists('Attachable', $data)) {
            $object->setAttachable($data['Attachable']);
        }
        if (\array_key_exists('Ingress', $data)) {
            $object->setIngress($data['Ingress']);
        }
        if (\array_key_exists('ConfigFrom', $data)) {
            $object->setConfigFrom($this->denormalizer->denormalize($data['ConfigFrom'], \Docker\API\Model\ConfigReference::class, 'json', $context));
        }
        if (\array_key_exists('ConfigOnly', $data)) {
            $object->setConfigOnly($data['ConfigOnly']);
        }
        if (\array_key_exists('Options', $data)) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Options'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setOptions($values_2);
        }
        if (\array_key_exists('Labels', $data)) {
            $values_3 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['Labels'] as $key_3 => $value_3) {
                $values_3[$key_3] = $value_3;
            }
            $object->setLabels($values_3);
        }
        if (\array_key_exists('Peers', $data)) {
            $values_4 = [];
            foreach ($data['Peers'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, \Docker\API\Model\PeerInfo::class, 'json', $context);
            }
            $object->setPeers($values_4);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('containers') && null !== $data->getContainers()) {
            $values = [];
            foreach ($data->getContainers() as $key => $value) {
                $values[$key] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Containers'] = $values;
        }
        if ($data->isInitialized('services') && null !== $data->getServices()) {
            $values_1 = [];
            foreach ($data->getServices() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $dataArray['Services'] = $values_1;
        }
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['Status'] = $this->normalizer->normalize($data->getStatus(), 'json', $context);
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('id') && null !== $data->getId()) {
            $dataArray['Id'] = $data->getId();
        }
        if ($data->isInitialized('created') && null !== $data->getCreated()) {
            $dataArray['Created'] = $data->getCreated();
        }
        if ($data->isInitialized('scope') && null !== $data->getScope()) {
            $dataArray['Scope'] = $data->getScope();
        }
        if ($data->isInitialized('driver') && null !== $data->getDriver()) {
            $dataArray['Driver'] = $data->getDriver();
        }
        if ($data->isInitialized('enableIPv4') && null !== $data->getEnableIPv4()) {
            $dataArray['EnableIPv4'] = $data->getEnableIPv4();
        }
        if ($data->isInitialized('enableIPv6') && null !== $data->getEnableIPv6()) {
            $dataArray['EnableIPv6'] = $data->getEnableIPv6();
        }
        if ($data->isInitialized('iPAM') && null !== $data->getIPAM()) {
            $dataArray['IPAM'] = $this->normalizer->normalize($data->getIPAM(), 'json', $context);
        }
        if ($data->isInitialized('internal') && null !== $data->getInternal()) {
            $dataArray['Internal'] = $data->getInternal();
        }
        if ($data->isInitialized('attachable') && null !== $data->getAttachable()) {
            $dataArray['Attachable'] = $data->getAttachable();
        }
        if ($data->isInitialized('ingress') && null !== $data->getIngress()) {
            $dataArray['Ingress'] = $data->getIngress();
        }
        if ($data->isInitialized('configFrom') && null !== $data->getConfigFrom()) {
            $dataArray['ConfigFrom'] = $this->normalizer->normalize($data->getConfigFrom(), 'json', $context);
        }
        if ($data->isInitialized('configOnly') && null !== $data->getConfigOnly()) {
            $dataArray['ConfigOnly'] = $data->getConfigOnly();
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $values_2 = [];
            foreach ($data->getOptions() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $dataArray['Options'] = $values_2;
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_3 = [];
            foreach ($data->getLabels() as $key_3 => $value_3) {
                $values_3[$key_3] = $value_3;
            }
            $dataArray['Labels'] = $values_3;
        }
        if ($data->isInitialized('peers') && null !== $data->getPeers()) {
            $values_4 = [];
            foreach ($data->getPeers() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $dataArray['Peers'] = $values_4;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\NetworkInspect::class => false];
    }
}
