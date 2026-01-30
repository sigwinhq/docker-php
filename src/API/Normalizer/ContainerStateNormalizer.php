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

final class ContainerStateNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\ContainerState::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\ContainerState::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\ContainerState();
        if (\array_key_exists('Running', $data) && \is_int($data['Running'])) {
            $data['Running'] = (bool) $data['Running'];
        }
        if (\array_key_exists('Paused', $data) && \is_int($data['Paused'])) {
            $data['Paused'] = (bool) $data['Paused'];
        }
        if (\array_key_exists('Restarting', $data) && \is_int($data['Restarting'])) {
            $data['Restarting'] = (bool) $data['Restarting'];
        }
        if (\array_key_exists('OOMKilled', $data) && \is_int($data['OOMKilled'])) {
            $data['OOMKilled'] = (bool) $data['OOMKilled'];
        }
        if (\array_key_exists('Dead', $data) && \is_int($data['Dead'])) {
            $data['Dead'] = (bool) $data['Dead'];
        }
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Status', $data)) {
            $object->setStatus($data['Status']);
        }
        if (\array_key_exists('Running', $data)) {
            $object->setRunning($data['Running']);
        }
        if (\array_key_exists('Paused', $data)) {
            $object->setPaused($data['Paused']);
        }
        if (\array_key_exists('Restarting', $data)) {
            $object->setRestarting($data['Restarting']);
        }
        if (\array_key_exists('OOMKilled', $data)) {
            $object->setOOMKilled($data['OOMKilled']);
        }
        if (\array_key_exists('Dead', $data)) {
            $object->setDead($data['Dead']);
        }
        if (\array_key_exists('Pid', $data)) {
            $object->setPid($data['Pid']);
        }
        if (\array_key_exists('ExitCode', $data)) {
            $object->setExitCode($data['ExitCode']);
        }
        if (\array_key_exists('Error', $data)) {
            $object->setError($data['Error']);
        }
        if (\array_key_exists('StartedAt', $data)) {
            $object->setStartedAt($data['StartedAt']);
        }
        if (\array_key_exists('FinishedAt', $data)) {
            $object->setFinishedAt($data['FinishedAt']);
        }
        if (\array_key_exists('Health', $data) && $data['Health'] !== null) {
            $object->setHealth($this->denormalizer->denormalize($data['Health'], \Docker\API\Model\Health::class, 'json', $context));
        } elseif (\array_key_exists('Health', $data) && $data['Health'] === null) {
            $object->setHealth(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('status') && null !== $data->getStatus()) {
            $dataArray['Status'] = $data->getStatus();
        }
        if ($data->isInitialized('running') && null !== $data->getRunning()) {
            $dataArray['Running'] = $data->getRunning();
        }
        if ($data->isInitialized('paused') && null !== $data->getPaused()) {
            $dataArray['Paused'] = $data->getPaused();
        }
        if ($data->isInitialized('restarting') && null !== $data->getRestarting()) {
            $dataArray['Restarting'] = $data->getRestarting();
        }
        if ($data->isInitialized('oOMKilled') && null !== $data->getOOMKilled()) {
            $dataArray['OOMKilled'] = $data->getOOMKilled();
        }
        if ($data->isInitialized('dead') && null !== $data->getDead()) {
            $dataArray['Dead'] = $data->getDead();
        }
        if ($data->isInitialized('pid') && null !== $data->getPid()) {
            $dataArray['Pid'] = $data->getPid();
        }
        if ($data->isInitialized('exitCode') && null !== $data->getExitCode()) {
            $dataArray['ExitCode'] = $data->getExitCode();
        }
        if ($data->isInitialized('error') && null !== $data->getError()) {
            $dataArray['Error'] = $data->getError();
        }
        if ($data->isInitialized('startedAt') && null !== $data->getStartedAt()) {
            $dataArray['StartedAt'] = $data->getStartedAt();
        }
        if ($data->isInitialized('finishedAt') && null !== $data->getFinishedAt()) {
            $dataArray['FinishedAt'] = $data->getFinishedAt();
        }
        if ($data->isInitialized('health')) {
            $dataArray['Health'] = $this->normalizer->normalize($data->getHealth(), 'json', $context);
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\ContainerState::class => false];
    }
}
