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

namespace Docker\API\Model;

final class TLSInfo
{
    /**
     * @var array
     */
    private $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * The root CA certificate(s) that are used to validate leaf TLS
     * certificates.
     *
     * @var string
     */
    private $trustRoot;
    /**
     * The base64-url-safe-encoded raw subject bytes of the issuer.
     *
     * @var string
     */
    private $certIssuerSubject;
    /**
     * The base64-url-safe-encoded raw public key bytes of the issuer.
     *
     * @var string
     */
    private $certIssuerPublicKey;

    /**
     * The root CA certificate(s) that are used to validate leaf TLS
     * certificates.
     */
    public function getTrustRoot(): string
    {
        return $this->trustRoot;
    }

    /**
     * The root CA certificate(s) that are used to validate leaf TLS
     * certificates.
     */
    public function setTrustRoot(string $trustRoot): self
    {
        $this->initialized['trustRoot'] = true;
        $this->trustRoot = $trustRoot;

        return $this;
    }

    /**
     * The base64-url-safe-encoded raw subject bytes of the issuer.
     */
    public function getCertIssuerSubject(): string
    {
        return $this->certIssuerSubject;
    }

    /**
     * The base64-url-safe-encoded raw subject bytes of the issuer.
     */
    public function setCertIssuerSubject(string $certIssuerSubject): self
    {
        $this->initialized['certIssuerSubject'] = true;
        $this->certIssuerSubject = $certIssuerSubject;

        return $this;
    }

    /**
     * The base64-url-safe-encoded raw public key bytes of the issuer.
     */
    public function getCertIssuerPublicKey(): string
    {
        return $this->certIssuerPublicKey;
    }

    /**
     * The base64-url-safe-encoded raw public key bytes of the issuer.
     */
    public function setCertIssuerPublicKey(string $certIssuerPublicKey): self
    {
        $this->initialized['certIssuerPublicKey'] = true;
        $this->certIssuerPublicKey = $certIssuerPublicKey;

        return $this;
    }
}
