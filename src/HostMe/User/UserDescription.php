<?php

namespace HostMe\User;

use GuzzleHttp\Command\Guzzle\Description;

/**
 * Class UserDescription.
 */
final class UserDescription extends Description
{
    /**
     * UserDescription constructor.
     *
     * @param array $config
     * @param array $options
     */
    public function __construct(array $config = [], array $options = [])
    {
        $config = array_merge([
            'name' => 'User API',

            'operations' => [
                'me' => [
                    'httpMethod' => 'GET',
                    'uri' => 'users/me.json',
                    'responseModel' => 'getResponse',
                ],

                'getClients' => [
                    'httpMethod' => 'GET',
                    'uri' => 'oauth_clients.json',
                    'responseModel' => 'getResponse',
                    'additionalParameters' => [
                        'location' => 'query',
                    ],
                ],

                'getClient' => [
                    'httpMethod' => 'GET',
                    'uri' => 'oauth_clients/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                'newClient' => [
                    'httpMethod' => 'POST',
                    'uri' => 'oauth_clients.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'name' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'user' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'allowedGrantTypes' => [
                            'type' => 'array',
                            'location' => 'json',
                            'required' => true,
                        ],
                    ],
                ],
            ],

            'models' => [
                'getResponse' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'location' => 'json',
                    ],
                ],
            ],
        ], $config);

        parent::__construct($config, $options);
    }
}
