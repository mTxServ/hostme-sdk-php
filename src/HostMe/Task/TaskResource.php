<?php

namespace HostMe\Task;

use HostMe\ResourceAbstract;

/**
 * Class TaskResource.
 */
class TaskResource extends ResourceAbstract
{
    /**
     * @return TaskDescription
     */
    protected function getServiceDescription()
    {
        return new TaskDescription();
    }
}
