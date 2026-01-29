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

final class ImageLoad extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * Load a set of images and tags into a repository.
     *
     * For details on the format, see the [export image endpoint](#operation/ImageGet).
     *
     * @param \Psr\Http\Message\StreamInterface|resource|string $imagesTarball   Tar archive containing images
     * @param array                                             $queryParameters {
     *
     * @var bool  $quiet suppress progress details during load
     * @var array $platform JSON encoded OCI platform(s) which will be used to select the
     *            platform-specific image(s) to load if the image is
     *            multi-platform. If not provided, the full multi-platform image
     *            will be loaded.
     *
     *     Example: `{"os": "linux", "architecture": "arm", "variant": "v5"}`
     *
     * }
     */
    public function __construct($imagesTarball, array $queryParameters = [])
    {
        $this->body = $imagesTarball;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/images/load';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], $this->body];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['quiet', 'platform']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['quiet' => false]);
        $optionsResolver->addAllowedTypes('quiet', ['bool']);
        $optionsResolver->addAllowedTypes('platform', ['array']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ImageLoadInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return null;
        }
        if ($status === 500) {
            throw new \Docker\API\Exception\ImageLoadInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
