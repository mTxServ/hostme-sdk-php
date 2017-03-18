<?php

namespace HostMe;

use HostMe\App\AppResource;
use HostMe\Box\BoxResource;
use HostMe\Platform\PlatformResource;
use HostMe\Task\TaskResource;
use HostMe\User\UserResource;

/**
 * Client.
 */
class Client
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var UserResource
     */
    private $user;

    /**
     * @var TaskResource
     */
    private $task;

    /**
     * @var BoxResource
     */
    private $box;

    /**
     * @var PlatformResource
     */
    private $platform;

    /**
     * @var AppResource
     */
    private $app;

    /**
     * @var Auth
     */
    private $auth;

    /**
     * Client constructor.
     */
    public function __construct(array $config = [])
    {
        $config = array_merge([
            'oauth' => [
                'oauth_endpoint' => 'http://user-dev.hostme.fr:82/app_dev.php/oauth/v2/token',
                'client_id' => '123',
                'client_secret' => 's$cr$t',
                'api_key' => 's$cr$t123',
            ],
            'box_endpoint' => 'http://box-dev.hostme.fr:83/app_dev.php/',
            'user_endpoint' => 'http://user-dev.hostme.fr:82/app_dev.php/',
            'app_endpoint' => 'http://app-dev.hostme.fr:85/app_dev.php/',
            'task_endpoint' => 'http://task-dev.hostme.fr:81/app_dev.php/',
            'platform_endpoint' => 'http://hostme.docker:8080/app_dev.php/api/',
        ], $config);

        $this->auth = new Auth($config['oauth']);
        $this->box = new BoxResource($config['box_endpoint']);
        $this->user = new UserResource($config['user_endpoint'], $this->auth);
        $this->app = new AppResource($config['app_endpoint'], $this->auth);
        $this->task = new TaskResource($config['task_endpoint'], $this->auth);
        $this->platform = new PlatformResource($config['platform_endpoint'], $this->auth);
    }

    /**
     * @return UserResource
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return BoxResource
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * @return AppResource
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * @return TaskResource
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @return PlatformResource
     */
    public function getPlatform()
    {
        return $this->platform;
    }
}
