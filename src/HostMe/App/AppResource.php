<?php

namespace HostMe\App;

use HostMe\ResourceAbstract;

/**
 * Class AppResource.
 */
class AppResource extends ResourceAbstract
{
    /**
     * @return AppDescription
     */
    protected function getServiceDescription()
    {
        return new AppDescription();
    }
}
