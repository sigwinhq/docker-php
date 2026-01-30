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

final class ImageInspectMetadata
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
     * Date and time at which the image was last tagged in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if the image was tagged locally,
     * and omitted otherwise.
     *
     * @var null|string
     */
    private $lastTagTime;

    /**
     * Date and time at which the image was last tagged in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if the image was tagged locally,
     * and omitted otherwise.
     */
    public function getLastTagTime(): ?string
    {
        return $this->lastTagTime;
    }

    /**
     * Date and time at which the image was last tagged in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * This information is only available if the image was tagged locally,
     * and omitted otherwise.
     */
    public function setLastTagTime(?string $lastTagTime): self
    {
        $this->initialized['lastTagTime'] = true;
        $this->lastTagTime = $lastTagTime;

        return $this;
    }
}
