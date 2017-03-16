<?php

namespace HostMe\User;

use HostMe\ResourceAbstract;

/**
 * Class UserResource.
 */
class UserResource extends ResourceAbstract
{
    /**
     * @return UserDescription
     */
    protected function getServiceDescription()
    {
        return new UserDescription();
    }
}
