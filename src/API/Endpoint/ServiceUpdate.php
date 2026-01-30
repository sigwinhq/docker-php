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

final class ServiceUpdate extends \Docker\API\Runtime\Client\BaseEndpoint implements \Docker\API\Runtime\Client\Endpoint
{
    use \Docker\API\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * @param string $id              ID or name of service
     * @param array  $queryParameters {
     *
     * @var int    $version The version number of the service object being updated. This is
     *             required to avoid conflicting writes.
     *             This version number should be the value as currently set on the
     *             service *before* the update. You can find the current version by
     *             calling `GET /services/{id}`
     * @var string $registryAuthFrom if the `X-Registry-Auth` header is not specified, this parameter
     *             indicates where to find registry authorization credentials
     * @var string $rollback Set to this parameter to `previous` to cause a server-side rollback
     *             to the previous service spec. The supplied spec will be ignored in
     *             this case.
     *
     * }
     *
     * @param array $headerParameters {
     *
     * @var string $X-Registry-Auth A base64url-encoded auth configuration for pulling from private
     *             registries.
     *
     *     Refer to the [authentication section](#section/Authentication) for
     *     details.
     *
     * }
     */
    public function __construct(string $id, \Docker\API\Model\ServicesIdUpdatePostBody $body, array $queryParameters = [], array $headerParameters = [])
    {
        $this->id = $id;
        $this->body = $body;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/services/{id}/update');
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
        $optionsResolver->setDefined(['version', 'registryAuthFrom', 'rollback']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults(['registryAuthFrom' => 'spec']);
        $optionsResolver->addAllowedTypes('version', ['int']);
        $optionsResolver->addAllowedTypes('registryAuthFrom', ['string']);
        $optionsResolver->addAllowedTypes('rollback', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['X-Registry-Auth']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('X-Registry-Auth', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws \Docker\API\Exception\ServiceUpdateBadRequestException
     * @throws \Docker\API\Exception\ServiceUpdateInternalServerErrorException
     * @throws \Docker\API\Exception\ServiceUpdateNotFoundException
     * @throws \Docker\API\Exception\ServiceUpdateServiceUnavailableException
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null): ?\Docker\API\Model\ServiceUpdateResponse
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return $serializer->deserialize($body, 'Docker\API\Model\ServiceUpdateResponse', 'json');
        }
        if ($status === 400) {
            throw new \Docker\API\Exception\ServiceUpdateBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 404) {
            throw new \Docker\API\Exception\ServiceUpdateNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new \Docker\API\Exception\ServiceUpdateInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 503) {
            throw new \Docker\API\Exception\ServiceUpdateServiceUnavailableException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
