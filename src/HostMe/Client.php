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
                'oauth_endpoint' => 'https://user.hostme.fr/oauth/v2/token',
                'client_id' => '123',
                'client_secret' => 's$cr$t',
                'api_key' => 's$cr$t123',
            ],
            'box_endpoint' => 'https://box.hostme.fr/',
            'user_endpoint' => 'https://user.hostme.fr/',
            'app_endpoint' => 'https://app.hostme.fr/',
            'task_endpoint' => 'https://task.hostme.fr/',
            'platform_endpoint' => 'https://hostme.fr/api/',
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

    /**
     * @return Auth
     */
    public function getAuth()
    {
        return $this->auth;
    }
}
