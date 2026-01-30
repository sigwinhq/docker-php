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

final class ImageManifestSummaryImageDataSize
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
     * Unpacked is the size (in bytes) of the locally unpacked
     * (uncompressed) image content that's directly usable by the containers
     * running this image.
     * It's independent of the distributable content - e.g.
     * the image might still have an unpacked data that's still used by
     * some container even when the distributable/compressed content is
     * already gone.
     *
     * @var int
     */
    private $unpacked;

    /**
     * Unpacked is the size (in bytes) of the locally unpacked
     * (uncompressed) image content that's directly usable by the containers
     * running this image.
     * It's independent of the distributable content - e.g.
     * the image might still have an unpacked data that's still used by
     * some container even when the distributable/compressed content is
     * already gone.
     */
    public function getUnpacked(): int
    {
        return $this->unpacked;
    }

    /**
     * Unpacked is the size (in bytes) of the locally unpacked
     * (uncompressed) image content that's directly usable by the containers
     * running this image.
     * It's independent of the distributable content - e.g.
     * the image might still have an unpacked data that's still used by
     * some container even when the distributable/compressed content is
     * already gone.
     */
    public function setUnpacked(int $unpacked): self
    {
        $this->initialized['unpacked'] = true;
        $this->unpacked = $unpacked;

        return $this;
    }
}
