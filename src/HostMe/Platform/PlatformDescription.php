<?php

namespace HostMe\Platform;

use GuzzleHttp\Command\Guzzle\Description;

/**
 * Class PlatformDescription.
 */
final class PlatformDescription extends Description
{
    /**
     * PlatformDescription constructor.
     *
     * @param array $config
     * @param array $options
     */
    public function __construct(array $config = [], array $options = [])
    {
        $config = array_merge([
            'name' => 'Platform API',

            'operations' => [
                // Public Ips
                'getPublicIps' => [
                    'httpMethod' => 'GET',
                    'uri' => 'publicips.json',
                    'responseModel' => 'getResponse',
                ],

                'getPublicIp' => [
                    'httpMethod' => 'GET',
                    'uri' => 'publicips/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                    'additionalParameters' => [
                        'ip' => [
                            'location' => 'uri',
                        ],
                    ],
                ],

                // Private Ips
                'getPrivateIps' => [
                    'httpMethod' => 'GET',
                    'uri' => 'privateips.json',
                    'responseModel' => 'getResponse',
                ],

                'getPrivateIp' => [
                    'httpMethod' => 'GET',
                    'uri' => 'privateips/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                // Servers
                'getServers' => [
                    'httpMethod' => 'GET',
                    'uri' => 'servers.json',
                    'responseModel' => 'getResponse',
                ],

                'getServer' => [
                    'httpMethod' => 'GET',
                    'uri' => 'servers/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                // Clients
                'getClients' => [
                    'httpMethod' => 'GET',
                    'uri' => 'clients.json',
                    'responseModel' => 'getResponse',
                ],

                'getClient' => [
                    'httpMethod' => 'GET',
                    'uri' => 'clients/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
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
