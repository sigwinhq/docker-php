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

namespace Docker\API\Endpoint;

final class ContainerAttachWebsocket extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * @param string $id              ID or name of the container
     * @param array  $queryParameters {
     *
     * @var string $detachKeys Override the key sequence for detaching a container.Format is a single
     *             character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
     *             `@`, `^`, `[`, `,`, or `_`.
     * @var bool   $logs Return logs
     * @var bool   $stream Return stream
     * @var bool   $stdin Attach to `stdin`
     * @var bool   $stdout Attach to `stdout`
     * @var bool   $stderr Attach to `stderr`
     *             }
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/attach/ws');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['detachKeys', 'logs', 'stream', 'stdin', 'stdout', 'stderr']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['logs' => false, 'stream' => false, 'stdin' => false, 'stdout' => false, 'stderr' => false]);
        $optionsResolver->addAllowedTypes('detachKeys', ['string']);
        $optionsResolver->addAllowedTypes('logs', ['bool']);
        $optionsResolver->addAllowedTypes('stream', ['bool']);
        $optionsResolver->addAllowedTypes('stdin', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ContainerAttachWebsocketBadRequestException
     * @throws \Docker\API\Exception\ContainerAttachWebsocketInternalServerErrorException
     * @throws \Docker\API\Exception\ContainerAttachWebsocketNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 101) {
            return null;
        }
        if ($status === 200) {
            return null;
        }
        if ($status === 400) {
            throw new \Docker\API\Exception\ContainerAttachWebsocketBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 404) {
            throw new \Docker\API\Exception\ContainerAttachWebsocketNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new \Docker\API\Exception\ContainerAttachWebsocketInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
