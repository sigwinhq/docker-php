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

final class SignerIdentityNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\SignerIdentity::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\SignerIdentity::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\SignerIdentity();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('CertificateIssuer', $data)) {
            $object->setCertificateIssuer($data['CertificateIssuer']);
        }
        if (\array_key_exists('SubjectAlternativeName', $data)) {
            $object->setSubjectAlternativeName($data['SubjectAlternativeName']);
        }
        if (\array_key_exists('Issuer', $data)) {
            $object->setIssuer($data['Issuer']);
        }
        if (\array_key_exists('BuildSignerURI', $data)) {
            $object->setBuildSignerURI($data['BuildSignerURI']);
        }
        if (\array_key_exists('BuildSignerDigest', $data)) {
            $object->setBuildSignerDigest($data['BuildSignerDigest']);
        }
        if (\array_key_exists('RunnerEnvironment', $data)) {
            $object->setRunnerEnvironment($data['RunnerEnvironment']);
        }
        if (\array_key_exists('SourceRepositoryURI', $data)) {
            $object->setSourceRepositoryURI($data['SourceRepositoryURI']);
        }
        if (\array_key_exists('SourceRepositoryDigest', $data)) {
            $object->setSourceRepositoryDigest($data['SourceRepositoryDigest']);
        }
        if (\array_key_exists('SourceRepositoryRef', $data)) {
            $object->setSourceRepositoryRef($data['SourceRepositoryRef']);
        }
        if (\array_key_exists('SourceRepositoryIdentifier', $data)) {
            $object->setSourceRepositoryIdentifier($data['SourceRepositoryIdentifier']);
        }
        if (\array_key_exists('SourceRepositoryOwnerURI', $data)) {
            $object->setSourceRepositoryOwnerURI($data['SourceRepositoryOwnerURI']);
        }
        if (\array_key_exists('SourceRepositoryOwnerIdentifier', $data)) {
            $object->setSourceRepositoryOwnerIdentifier($data['SourceRepositoryOwnerIdentifier']);
        }
        if (\array_key_exists('BuildConfigURI', $data)) {
            $object->setBuildConfigURI($data['BuildConfigURI']);
        }
        if (\array_key_exists('BuildConfigDigest', $data)) {
            $object->setBuildConfigDigest($data['BuildConfigDigest']);
        }
        if (\array_key_exists('BuildTrigger', $data)) {
            $object->setBuildTrigger($data['BuildTrigger']);
        }
        if (\array_key_exists('RunInvocationURI', $data)) {
            $object->setRunInvocationURI($data['RunInvocationURI']);
        }
        if (\array_key_exists('SourceRepositoryVisibilityAtSigning', $data)) {
            $object->setSourceRepositoryVisibilityAtSigning($data['SourceRepositoryVisibilityAtSigning']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('certificateIssuer') && null !== $data->getCertificateIssuer()) {
            $dataArray['CertificateIssuer'] = $data->getCertificateIssuer();
        }
        if ($data->isInitialized('subjectAlternativeName') && null !== $data->getSubjectAlternativeName()) {
            $dataArray['SubjectAlternativeName'] = $data->getSubjectAlternativeName();
        }
        if ($data->isInitialized('issuer') && null !== $data->getIssuer()) {
            $dataArray['Issuer'] = $data->getIssuer();
        }
        if ($data->isInitialized('buildSignerURI') && null !== $data->getBuildSignerURI()) {
            $dataArray['BuildSignerURI'] = $data->getBuildSignerURI();
        }
        if ($data->isInitialized('buildSignerDigest') && null !== $data->getBuildSignerDigest()) {
            $dataArray['BuildSignerDigest'] = $data->getBuildSignerDigest();
        }
        if ($data->isInitialized('runnerEnvironment') && null !== $data->getRunnerEnvironment()) {
            $dataArray['RunnerEnvironment'] = $data->getRunnerEnvironment();
        }
        if ($data->isInitialized('sourceRepositoryURI') && null !== $data->getSourceRepositoryURI()) {
            $dataArray['SourceRepositoryURI'] = $data->getSourceRepositoryURI();
        }
        if ($data->isInitialized('sourceRepositoryDigest') && null !== $data->getSourceRepositoryDigest()) {
            $dataArray['SourceRepositoryDigest'] = $data->getSourceRepositoryDigest();
        }
        if ($data->isInitialized('sourceRepositoryRef') && null !== $data->getSourceRepositoryRef()) {
            $dataArray['SourceRepositoryRef'] = $data->getSourceRepositoryRef();
        }
        if ($data->isInitialized('sourceRepositoryIdentifier') && null !== $data->getSourceRepositoryIdentifier()) {
            $dataArray['SourceRepositoryIdentifier'] = $data->getSourceRepositoryIdentifier();
        }
        if ($data->isInitialized('sourceRepositoryOwnerURI') && null !== $data->getSourceRepositoryOwnerURI()) {
            $dataArray['SourceRepositoryOwnerURI'] = $data->getSourceRepositoryOwnerURI();
        }
        if ($data->isInitialized('sourceRepositoryOwnerIdentifier') && null !== $data->getSourceRepositoryOwnerIdentifier()) {
            $dataArray['SourceRepositoryOwnerIdentifier'] = $data->getSourceRepositoryOwnerIdentifier();
        }
        if ($data->isInitialized('buildConfigURI') && null !== $data->getBuildConfigURI()) {
            $dataArray['BuildConfigURI'] = $data->getBuildConfigURI();
        }
        if ($data->isInitialized('buildConfigDigest') && null !== $data->getBuildConfigDigest()) {
            $dataArray['BuildConfigDigest'] = $data->getBuildConfigDigest();
        }
        if ($data->isInitialized('buildTrigger') && null !== $data->getBuildTrigger()) {
            $dataArray['BuildTrigger'] = $data->getBuildTrigger();
        }
        if ($data->isInitialized('runInvocationURI') && null !== $data->getRunInvocationURI()) {
            $dataArray['RunInvocationURI'] = $data->getRunInvocationURI();
        }
        if ($data->isInitialized('sourceRepositoryVisibilityAtSigning') && null !== $data->getSourceRepositoryVisibilityAtSigning()) {
            $dataArray['SourceRepositoryVisibilityAtSigning'] = $data->getSourceRepositoryVisibilityAtSigning();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\SignerIdentity::class => false];
    }
}
