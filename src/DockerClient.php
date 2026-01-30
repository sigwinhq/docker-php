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
use Docker\Endpoint\ContainerAttach;
use Docker\Endpoint\ContainerAttachWebsocket;
use Docker\Endpoint\ContainerLogs;
use Docker\Endpoint\ExecStart;
use Docker\Endpoint\ImageBuild;
use Docker\Endpoint\ImageCreate;
use Docker\Endpoint\ImagePush;
use Docker\Endpoint\SystemEvents;

/**
 * Docker\Docker.
 */
final class DockerClient extends Client
{
    public function containerAttach(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerAttach($id, $queryParameters), $fetch);
    }

    public function containerAttachWebsocket(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerAttachWebsocket($id, $queryParameters), $fetch);
    }

    public function containerLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerLogs($id, $queryParameters), $fetch);
    }

    public function execStart(string $id, API\Model\ExecIdStartPostBody $execStartConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ExecStart($id, $execStartConfig), $fetch);
    }

    public function imageBuild($inputStream, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageBuild($inputStream, $queryParameters, $headerParameters), $fetch);
    }

    public function imageCreate(string $inputImage, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageCreate($inputImage, $queryParameters, $headerParameters), $fetch);
    }

    public function imagePush(string $name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        if (isset($headerParameters['X-Registry-Auth']) && $headerParameters['X-Registry-Auth'] instanceof AuthConfig) {
            $headerParameters['X-Registry-Auth'] = base64_encode($this->serializer->serialize($headerParameters['X-Registry-Auth'], 'json'));
        }

        return $this->executeEndpoint(new ImagePush($name, $queryParameters, $headerParameters), $fetch);
    }

    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemEvents($queryParameters), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = []): self
    {
        if ($httpClient === null) {
            $httpClient = DockerClientFactory::createFromEnv();
        }

        return parent::create($httpClient, $additionalPlugins, $additionalNormalizers);
    }
}
