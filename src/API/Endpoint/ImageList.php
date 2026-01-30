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

final class ImageList extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.
     *
     * @param array $queryParameters {
     *
     * @var bool   $all Show all images. Only images from a final layer (no children) are shown by default.
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the images list.
     *
     *     Available filters:
     *
     *     - `before`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     *     - `dangling=true`
     *     - `label=key` or `label="key=value"` of an image label
     *     - `reference`=(`<image-name>[:<tag>]`)
     *     - `since`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     *     - `until=<timestamp>`
     * @var bool $shared-size Compute and show shared size as a `SharedSize` field on each image
     * @var bool $digests show digest information as a `RepoDigests` field on each image
     * @var bool $manifests Include `Manifests` in the image summary.
     *           }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/images/json';
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
        $optionsResolver->setDefined(['all', 'filters', 'shared-size', 'digests', 'manifests']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['all' => false, 'shared-size' => false, 'digests' => false, 'manifests' => false]);
        $optionsResolver->addAllowedTypes('all', ['bool']);
        $optionsResolver->addAllowedTypes('filters', ['string']);
        $optionsResolver->addAllowedTypes('shared-size', ['bool']);
        $optionsResolver->addAllowedTypes('digests', ['bool']);
        $optionsResolver->addAllowedTypes('manifests', ['bool']);

        return $optionsResolver;
    }

    /**
     * @return null|\Docker\API\Model\ImageSummary[]
     *
     * @throws \Docker\API\Exception\ImageListInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null): ?array
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return $serializer->deserialize($body, 'Docker\API\Model\ImageSummary[]', 'json');
        }
        if ($status === 500) {
            throw new \Docker\API\Exception\ImageListInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
