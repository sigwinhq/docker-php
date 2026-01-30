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

final class ContainerCreate extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * @param \Docker\API\Model\ContainersCreatePostBody $body            Container to create
     * @param array                                      $queryParameters {
     *
     * @var string $name Assign the specified name to the container. Must match
     *             `/?[a-zA-Z0-9][a-zA-Z0-9_.-]+`.
     * @var string $platform Platform in the format `os[/arch[/variant]]` used for image lookup.
     *
     *     When specified, the daemon checks if the requested image is present
     *     in the local image cache with the given OS and Architecture, and
     *     otherwise returns a `404` status.
     *
     *     If the option is not set, the host's native OS and Architecture are
     *     used to look up the image in the image cache. However, if no platform
     *     is passed and the given image does exist in the local image cache,
     *     but its OS or architecture does not match, the container is created
     *     with the available image, and a warning is added to the `Warnings`
     *     field in the response, for example;
     *
     *         WARNING: The requested image's platform (linux/arm64/v8) does not
     *                  match the detected host platform (linux/amd64) and no
     *                  specific platform was requested
     *
     * }
     */
    public function __construct(\Docker\API\Model\ContainersCreatePostBody $body, array $queryParameters = [])
    {
        $this->body = $body;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/containers/create';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return $this->getSerializedBody($serializer);
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['name', 'platform']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['platform' => '']);
        $optionsResolver->addAllowedTypes('name', ['string']);
        $optionsResolver->addAllowedTypes('platform', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ContainerCreateBadRequestException
     * @throws \Docker\API\Exception\ContainerCreateConflictException
     * @throws \Docker\API\Exception\ContainerCreateInternalServerErrorException
     * @throws \Docker\API\Exception\ContainerCreateNotFoundException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null): ?\Docker\API\Model\ContainerCreateResponse
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 201) {
            return $serializer->deserialize($body, 'Docker\API\Model\ContainerCreateResponse', 'json');
        }
        if ($status === 400) {
            throw new \Docker\API\Exception\ContainerCreateBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 404) {
            throw new \Docker\API\Exception\ContainerCreateNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 409) {
            throw new \Docker\API\Exception\ContainerCreateConflictException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new \Docker\API\Exception\ContainerCreateInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
