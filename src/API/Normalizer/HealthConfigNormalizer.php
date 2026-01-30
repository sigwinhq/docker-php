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

final class HealthConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface, NormalizerAwareInterface, NormalizerInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === \Docker\API\Model\HealthConfig::class;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && $data::class === \Docker\API\Model\HealthConfig::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Docker\API\Model\HealthConfig();
        if ($data === null || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('Test', $data)) {
            $values = [];
            foreach ($data['Test'] as $value) {
                $values[] = $value;
            }
            $object->setTest($values);
        }
        if (\array_key_exists('Interval', $data)) {
            $object->setInterval($data['Interval']);
        }
        if (\array_key_exists('Timeout', $data)) {
            $object->setTimeout($data['Timeout']);
        }
        if (\array_key_exists('Retries', $data)) {
            $object->setRetries($data['Retries']);
        }
        if (\array_key_exists('StartPeriod', $data)) {
            $object->setStartPeriod($data['StartPeriod']);
        }
        if (\array_key_exists('StartInterval', $data)) {
            $object->setStartInterval($data['StartInterval']);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('test') && null !== $data->getTest()) {
            $values = [];
            foreach ($data->getTest() as $value) {
                $values[] = $value;
            }
            $dataArray['Test'] = $values;
        }
        if ($data->isInitialized('interval') && null !== $data->getInterval()) {
            $dataArray['Interval'] = $data->getInterval();
        }
        if ($data->isInitialized('timeout') && null !== $data->getTimeout()) {
            $dataArray['Timeout'] = $data->getTimeout();
        }
        if ($data->isInitialized('retries') && null !== $data->getRetries()) {
            $dataArray['Retries'] = $data->getRetries();
        }
        if ($data->isInitialized('startPeriod') && null !== $data->getStartPeriod()) {
            $dataArray['StartPeriod'] = $data->getStartPeriod();
        }
        if ($data->isInitialized('startInterval') && null !== $data->getStartInterval()) {
            $dataArray['StartInterval'] = $data->getStartInterval();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [\Docker\API\Model\HealthConfig::class => false];
    }
}
