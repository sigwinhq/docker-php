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

final class EndpointSettingsNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\EndpointSettings::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\EndpointSettings::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\EndpointSettings();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] !== null) {
            $object->setIPAMConfig($this->denormalizer->denormalize($data['IPAMConfig'], \Docker\API\Model\EndpointIPAMConfig::class, 'json', $context));
        } elseif (\array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] === null) {
            $object->setIPAMConfig(null);
        }
        if (\array_key_exists('Links', $data)) {
            $values = [];
            foreach ($data['Links'] as $value) {
                $values[] = $value;
            }
            $object->setLinks($values);
        }
        if (\array_key_exists('MacAddress', $data)) {
            $object->setMacAddress($data['MacAddress']);
        }
        if (\array_key_exists('Aliases', $data)) {
            $values_1 = [];
            foreach ($data['Aliases'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setAliases($values_1);
        }
        if (\array_key_exists('DriverOpts', $data) && $data['DriverOpts'] !== null) {
            $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['DriverOpts'] as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $object->setDriverOpts($values_2);
        } elseif (\array_key_exists('DriverOpts', $data) && $data['DriverOpts'] === null) {
            $object->setDriverOpts(null);
        }
        if (\array_key_exists('GwPriority', $data)) {
            $object->setGwPriority($data['GwPriority']);
        }
        if (\array_key_exists('NetworkID', $data)) {
            $object->setNetworkID($data['NetworkID']);
        }
        if (\array_key_exists('EndpointID', $data)) {
            $object->setEndpointID($data['EndpointID']);
        }
        if (\array_key_exists('Gateway', $data)) {
            $object->setGateway($data['Gateway']);
        }
        if (\array_key_exists('IPAddress', $data)) {
            $object->setIPAddress($data['IPAddress']);
        }
        if (\array_key_exists('IPPrefixLen', $data)) {
            $object->setIPPrefixLen($data['IPPrefixLen']);
        }
        if (\array_key_exists('IPv6Gateway', $data)) {
            $object->setIPv6Gateway($data['IPv6Gateway']);
        }
        if (\array_key_exists('GlobalIPv6Address', $data)) {
            $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
        }
        if (\array_key_exists('GlobalIPv6PrefixLen', $data)) {
            $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
        }
        if (\array_key_exists('DNSNames', $data)) {
            $values_3 = [];
            foreach ($data['DNSNames'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setDNSNames($values_3);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('iPAMConfig')) {
            $dataArray['IPAMConfig'] = $this->normalizer->normalize($data->getIPAMConfig(), 'json', $context);
        }
        if ($data->isInitialized('links') && null !== $data->getLinks()) {
            $values = [];
            foreach ($data->getLinks() as $value) {
                $values[] = $value;
            }
            $dataArray['Links'] = $values;
        }
        if ($data->isInitialized('macAddress') && null !== $data->getMacAddress()) {
            $dataArray['MacAddress'] = $data->getMacAddress();
        }
        if ($data->isInitialized('aliases') && null !== $data->getAliases()) {
            $values_1 = [];
            foreach ($data->getAliases() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Aliases'] = $values_1;
        }
        if ($data->isInitialized('driverOpts')) {
            $values_2 = [];
            foreach ($data->getDriverOpts() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $dataArray['DriverOpts'] = $values_2;
        }
        if ($data->isInitialized('gwPriority') && null !== $data->getGwPriority()) {
            $dataArray['GwPriority'] = $data->getGwPriority();
        }
        if ($data->isInitialized('networkID') && null !== $data->getNetworkID()) {
            $dataArray['NetworkID'] = $data->getNetworkID();
        }
        if ($data->isInitialized('endpointID') && null !== $data->getEndpointID()) {
            $dataArray['EndpointID'] = $data->getEndpointID();
        }
        if ($data->isInitialized('gateway') && null !== $data->getGateway()) {
            $dataArray['Gateway'] = $data->getGateway();
        }
        if ($data->isInitialized('iPAddress') && null !== $data->getIPAddress()) {
            $dataArray['IPAddress'] = $data->getIPAddress();
        }
        if ($data->isInitialized('iPPrefixLen') && null !== $data->getIPPrefixLen()) {
            $dataArray['IPPrefixLen'] = $data->getIPPrefixLen();
        }
        if ($data->isInitialized('iPv6Gateway') && null !== $data->getIPv6Gateway()) {
            $dataArray['IPv6Gateway'] = $data->getIPv6Gateway();
        }
        if ($data->isInitialized('globalIPv6Address') && null !== $data->getGlobalIPv6Address()) {
            $dataArray['GlobalIPv6Address'] = $data->getGlobalIPv6Address();
        }
        if ($data->isInitialized('globalIPv6PrefixLen') && null !== $data->getGlobalIPv6PrefixLen()) {
            $dataArray['GlobalIPv6PrefixLen'] = $data->getGlobalIPv6PrefixLen();
        }
        if ($data->isInitialized('dNSNames') && null !== $data->getDNSNames()) {
            $values_3 = [];
            foreach ($data->getDNSNames() as $value_3) {
                $values_3[] = $value_3;
            }
            $dataArray['DNSNames'] = $values_3;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\EndpointSettings::class => false];
    }
}
