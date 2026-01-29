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

final class SignatureIdentityNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\SignatureIdentity::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\SignatureIdentity::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SignatureIdentity();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Name', $data)) {
            $object->setName($data['Name']);
        }
        if (\array_key_exists('Timestamps', $data)) {
            $values = [];
            foreach ($data['Timestamps'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, \Docker\API\Model\SignatureTimestamp::class, 'json', $context);
            }
            $object->setTimestamps($values);
        }
        if (\array_key_exists('KnownSigner', $data)) {
            $object->setKnownSigner($data['KnownSigner']);
        }
        if (\array_key_exists('DockerReference', $data)) {
            $object->setDockerReference($data['DockerReference']);
        }
        if (\array_key_exists('Signer', $data)) {
            $object->setSigner($this->denormalizer->denormalize($data['Signer'], \Docker\API\Model\SignerIdentity::class, 'json', $context));
        }
        if (\array_key_exists('SignatureType', $data)) {
            $object->setSignatureType($data['SignatureType']);
        }
        if (\array_key_exists('Error', $data)) {
            $object->setError($data['Error']);
        }
        if (\array_key_exists('Warnings', $data)) {
            $values_1 = [];
            foreach ($data['Warnings'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setWarnings($values_1);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['Name'] = $data->getName();
        }
        if ($data->isInitialized('timestamps') && null !== $data->getTimestamps()) {
            $values = [];
            foreach ($data->getTimestamps() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $dataArray['Timestamps'] = $values;
        }
        if ($data->isInitialized('knownSigner') && null !== $data->getKnownSigner()) {
            $dataArray['KnownSigner'] = $data->getKnownSigner();
        }
        if ($data->isInitialized('dockerReference') && null !== $data->getDockerReference()) {
            $dataArray['DockerReference'] = $data->getDockerReference();
        }
        if ($data->isInitialized('signer') && null !== $data->getSigner()) {
            $dataArray['Signer'] = $this->normalizer->normalize($data->getSigner(), 'json', $context);
        }
        if ($data->isInitialized('signatureType') && null !== $data->getSignatureType()) {
            $dataArray['SignatureType'] = $data->getSignatureType();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['Error'] = $data->getError();
        }
        if ($data->isInitialized('warnings') && null !== $data->getWarnings()) {
            $values_1 = [];
            foreach ($data->getWarnings() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['Warnings'] = $values_1;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SignatureIdentity::class => false];
    }
}
