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

namespace Docker;

use Docker\API\Client;
use Docker\API\Model\AuthConfig;
use Docker\Stream\BuildStream;
use Docker\Stream\CreateImageStream;
use Docker\Stream\EventStream;
use Docker\Stream\PushStream;

/**
 * Docker\Docker.
 */
final class DockerClient extends Client
{
    public function containerAttach(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new API\Endpoint\ContainerAttach($id, $queryParameters), $fetch);
    }

    public function containerAttachWebsocket(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new API\Endpoint\ContainerAttachWebsocket($id, $queryParameters), $fetch);
    }

    public function containerLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new API\Endpoint\ContainerLogs($id, $queryParameters), $fetch);
    }

    public function execStart(string $id, API\Model\ExecIdStartPostBody $execStartConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new API\Endpoint\ExecStart($id, $execStartConfig), $fetch);
    }

    public function imageBuild($inputStream, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        if ($fetch === self::FETCH_OBJECT) {
            $response = $this->executeRawEndpoint(new API\Endpoint\ImageBuild($inputStream, $queryParameters, $headerParameters));

            return new BuildStream($response->getBody(), $this->serializer);
        }

        return $this->executeEndpoint(new API\Endpoint\ImageBuild($inputStream, $queryParameters, $headerParameters), $fetch);
    }

    public function imageCreate(string $inputImage, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        if ($fetch === self::FETCH_OBJECT) {
            $response = $this->executeRawEndpoint(new API\Endpoint\ImageCreate($inputImage, $queryParameters, $headerParameters));

            return new CreateImageStream($response->getBody(), $this->serializer);
        }

        return $this->executeEndpoint(new API\Endpoint\ImageCreate($inputImage, $queryParameters, $headerParameters), $fetch);
    }

    public function imagePush(string $name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        if (isset($headerParameters['X-Registry-Auth']) && $headerParameters['X-Registry-Auth'] instanceof AuthConfig) {
            $headerParameters['X-Registry-Auth'] = base64_encode($this->serializer->serialize($headerParameters['X-Registry-Auth'], 'json'));
        }

        if ($fetch === self::FETCH_OBJECT) {
            $response = $this->executeRawEndpoint(new API\Endpoint\ImagePush($name, $queryParameters, $headerParameters));

            return new PushStream($response->getBody(), $this->serializer);
        }

        return $this->executeEndpoint(new API\Endpoint\ImagePush($name, $queryParameters, $headerParameters), $fetch);
    }

    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        if ($fetch === self::FETCH_OBJECT) {
            $response = $this->executeRawEndpoint(new API\Endpoint\SystemEvents($queryParameters));

            return new EventStream($response->getBody(), $this->serializer);
        }

        return $this->executeEndpoint(new API\Endpoint\SystemEvents($queryParameters), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = []): self
    {
        if ($httpClient === null) {
            $httpClient = DockerClientFactory::createFromEnv();
        }

        if (\count($additionalPlugins) > 0) {
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $additionalPlugins);
        }

        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new API\Normalizer\JaneObjectNormalizer()];
        if (\count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true]))]);

        return new self($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
