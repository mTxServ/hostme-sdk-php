<?php

namespace HostMe\Platform;

use HostMe\ResourceAbstract;

/**
 * Class PlatformResource.
 */
class PlatformResource extends ResourceAbstract
{
    /**
     * @return PlatformDescription
     */
    protected function getServiceDescription()
    {
        return new PlatformDescription();
    }
}
