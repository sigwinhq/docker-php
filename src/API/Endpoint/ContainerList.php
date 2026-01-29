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

final class ContainerList extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;

    /**
     * Returns a list of containers. For details on the format, see the
     * [inspect endpoint](#operation/ContainerInspect).
     *
     * Note that it uses a different, smaller representation of a container
     * than inspecting a single container. For example, the list of linked
     * containers is not propagated .
     *
     * @param array $queryParameters {
     *
     * @var bool   $all Return all containers. By default, only running containers are shown.
     * @var int    $limit return this number of most recently created containers, including
     *             non-running ones
     * @var bool   $size return the size of container as fields `SizeRw` and `SizeRootFs`
     * @var string $filters Filters to process on the container list, encoded as JSON (a
     *             `map[string][]string`). For example, `{"status": ["paused"]}` will
     *             only return paused containers.
     *
     *     Available filters:
     *
     *     - `ancestor`=(`<image-name>[:<tag>]`, `<image id>`, or `<image@digest>`)
     *     - `before`=(`<container id>` or `<container name>`)
     *     - `expose`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     *     - `exited=<int>` containers with exit code of `<int>`
     *     - `health`=(`starting`|`healthy`|`unhealthy`|`none`)
     *     - `id=<ID>` a container's ID
     *     - `isolation=`(`default`|`process`|`hyperv`) (Windows daemon only)
     *     - `is-task=`(`true`|`false`)
     *     - `label=key` or `label="key=value"` of a container label
     *     - `name=<name>` a container's name
     *     - `network`=(`<network id>` or `<network name>`)
     *     - `publish`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     *     - `since`=(`<container id>` or `<container name>`)
     *     - `status=`(`created`|`restarting`|`running`|`removing`|`paused`|`exited`|`dead`)
     *     - `volume`=(`<volume name>` or `<mount point destination>`)
     *
     * }
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
        return '/containers/json';
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
        $optionsResolver->setDefined(['all', 'limit', 'size', 'filters']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['all' => false, 'size' => false]);
        $optionsResolver->addAllowedTypes('all', ['bool']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('size', ['bool']);
        $optionsResolver->addAllowedTypes('filters', ['string']);

        return $optionsResolver;
    }

    /**
     * @return null|\Docker\API\Model\ContainerSummary[]
     *
     * @throws \Docker\API\Exception\ContainerListBadRequestException
     * @throws \Docker\API\Exception\ContainerListInternalServerErrorException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null): ?array
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return $serializer->deserialize($body, 'Docker\API\Model\ContainerSummary[]', 'json');
        }
        if ($status === 400) {
            throw new \Docker\API\Exception\ContainerListBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new \Docker\API\Exception\ContainerListInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
