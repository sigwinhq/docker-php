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

final class TaskSpecContainerSpecPrivilegesNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\TaskSpecContainerSpecPrivileges::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\TaskSpecContainerSpecPrivileges::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\TaskSpecContainerSpecPrivileges();
        if (\array_key_exists('NoNewPrivileges', $data) && \is_int($data['NoNewPrivileges'])) {
            $data['NoNewPrivileges'] = (bool) $data['NoNewPrivileges'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CredentialSpec', $data)) {
            $object->setCredentialSpec($this->denormalizer->denormalize($data['CredentialSpec'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec::class, 'json', $context));
        }
        if (\array_key_exists('SELinuxContext', $data)) {
            $object->setSELinuxContext($this->denormalizer->denormalize($data['SELinuxContext'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext::class, 'json', $context));
        }
        if (\array_key_exists('Seccomp', $data)) {
            $object->setSeccomp($this->denormalizer->denormalize($data['Seccomp'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesSeccomp::class, 'json', $context));
        }
        if (\array_key_exists('AppArmor', $data)) {
            $object->setAppArmor($this->denormalizer->denormalize($data['AppArmor'], \Docker\API\Model\TaskSpecContainerSpecPrivilegesAppArmor::class, 'json', $context));
        }
        if (\array_key_exists('NoNewPrivileges', $data)) {
            $object->setNoNewPrivileges($data['NoNewPrivileges']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('credentialSpec') && null !== $data->getCredentialSpec()) {
            $dataArray['CredentialSpec'] = $this->normalizer->normalize($data->getCredentialSpec(), 'json', $context);
        }
        if ($data->isInitialized('sELinuxContext') && null !== $data->getSELinuxContext()) {
            $dataArray['SELinuxContext'] = $this->normalizer->normalize($data->getSELinuxContext(), 'json', $context);
        }
        if ($data->isInitialized('seccomp') && null !== $data->getSeccomp()) {
            $dataArray['Seccomp'] = $this->normalizer->normalize($data->getSeccomp(), 'json', $context);
        }
        if ($data->isInitialized('appArmor') && null !== $data->getAppArmor()) {
            $dataArray['AppArmor'] = $this->normalizer->normalize($data->getAppArmor(), 'json', $context);
        }
        if ($data->isInitialized('noNewPrivileges') && null !== $data->getNoNewPrivileges()) {
            $dataArray['NoNewPrivileges'] = $data->getNoNewPrivileges();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\TaskSpecContainerSpecPrivileges::class => false];
    }
}
