<?php

namespace HostMe;

use GuzzleHttp\Client as BaseGuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\HandlerStack;
use HostMe\Handler\AuthentificationHandler;

/**
 * Class ResourceAbstract.
 */
abstract class ResourceAbstract
{
    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var Auth
     */
    private $auth;

    /**
     * @var GuzzleClient
     */
    protected $client;

    /**
     * ResourceAbstract constructor.
     *
     * @param string     string
     * @param Auth|null $auth
     */
    public function __construct($baseUri, Auth $auth = null)
    {
        $this->baseUri = $baseUri;
        $this->auth = $auth;
    }

    /**
     * create guzzle client.
     */
    public function createClient()
    {
        if (null !== $this->client) {
            return;
        }

        $stack = HandlerStack::create();

        if ($this->auth instanceof Auth) {
            $auth = new AuthentificationHandler($this->auth->getAccessToken());
            $stack->push($auth);
        }

        $client = new BaseGuzzleClient([
            'base_uri' => $this->baseUri,
            'headers' => [
                'User-Agent' => 'HostMe SDK PHP',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'handler' => $stack,
        ]);

        $this->client = new GuzzleClient($client, $this->getServiceDescription());
    }

    /**
     * @param string $name
     * @param array  $arguments
     *
     * @return mixed
     */
    public function __call($name, array $arguments)
    {
        if (!$this->client) {
            $this->createClient();
        }

        return call_user_func_array([$this->client, $name], $arguments);
    }

    /**
     * @return Description
     */
    abstract protected function getServiceDescription();
}
