<?php

namespace HostMe\App;

use GuzzleHttp\Command\Guzzle\Description;

/**
 * Class AppDescription.
 */
final class AppDescription extends Description
{
    /**
     * AppDescription constructor.
     *
     * @param array $config
     * @param array $options
     */
    public function __construct(array $config = [], array $options = [])
    {
        $config = array_merge([
            'name' => 'Application API',

            'operations' => [
                // Applications
                'getApplications' => [
                    'httpMethod' => 'GET',
                    'uri' => 'applications.json',
                    'responseModel' => 'getResponse',
                    'additionalParameters' => [
                        'location' => 'query',
                    ],
                ],

                'getApplication' => [
                    'httpMethod' => 'GET',
                    'uri' => 'applications/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                'newApplication' => [
                    'httpMethod' => 'POST',
                    'uri' => '/applications.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'serverId' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'name' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'description' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'rootPath' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'data' => [
                            'type' => 'array',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'components' => [
                            'type' => 'array',
                            'location' => 'json',
                            'required' => false,
                        ],
                    ],
                ],

                // Components
                'getComponents' => [
                    'httpMethod' => 'GET',
                    'uri' => 'components.json',
                    'responseModel' => 'getResponse',
                    'additionalParameters' => [
                        'location' => 'query',
                    ],
                ],

                'getComponent' => [
                    'httpMethod' => 'GET',
                    'uri' => 'components/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                'newComponent' => [
                    'httpMethod' => 'POST',
                    'uri' => '/components.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'application' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'name' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'version' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => false,
                        ],
                        'data' => [
                            'type' => 'array',
                            'location' => 'json',
                            'required' => false,
                        ],
                    ],
                ],

                // Scans
                'getScans' => [
                    'httpMethod' => 'GET',
                    'uri' => 'scans.json',
                    'responseModel' => 'getResponse',
                    'additionalParameters' => [
                        'location' => 'query',
                    ],
                ],

                'getScan' => [
                    'httpMethod' => 'GET',
                    'uri' => 'scans/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                'newScan' => [
                    'httpMethod' => 'POST',
                    'uri' => '/scans.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'serverId' => [
                            'type' => 'string',
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
