<?php

namespace HostMe\Box;

use HostMe\ResourceAbstract;

/**
 * Class BoxResource.
 */
class BoxResource extends ResourceAbstract
{
    /**
     * @return UserDescription
     */
    protected function getServiceDescription()
    {
        return new BoxDescription();
    }
}
