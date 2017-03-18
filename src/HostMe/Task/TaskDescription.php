<?php

namespace HostMe\Task;

use GuzzleHttp\Command\Guzzle\Description;

/**
 * Class TaskDescription.
 */
final class TaskDescription extends Description
{
    /**
     * TaskDescription constructor.
     *
     * @param array $config
     * @param array $options
     */
    public function __construct(array $config = [], array $options = [])
    {
        $config = array_merge([
            'name' => 'Task API',

            'operations' => [
                'getTasks' => [
                    'httpMethod' => 'GET',
                    'uri' => 'tasks.json',
                    'responseModel' => 'getResponse',
                    'additionalParameters' => [
                        'location' => 'query',
                    ],
                ],

                'getTask' => [
                    'httpMethod' => 'GET',
                    'uri' => 'tasks/{id}.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                'newTask' => [
                    'httpMethod' => 'POST',
                    'uri' => '/tasks.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'serverId' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'commandName' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                        'parameters' => [
                            'type' => 'array',
                            'location' => 'json',
                            'required' => true,
                        ],
                    ],
                ],

                'setOutput' => [
                    'httpMethod' => 'PUT',
                    'uri' => 'tasks/{id}/output.json',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                        'output' => [
                            'type' => 'string',
                            'location' => 'json',
                            'required' => true,
                        ],
                    ],
                ],

                'markSuccess' => [
                    'httpMethod' => 'PUT',
                    'uri' => 'tasks/{id}/markSuccess.{_format}',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                'markError' => [
                    'httpMethod' => 'PUT',
                    'uri' => 'tasks/{id}/markError.{_format}',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'id' => [
                            'location' => 'uri',
                            'required' => true,
                        ],
                    ],
                ],

                'markProcessing' => [
                    'httpMethod' => 'PUT',
                    'uri' => 'tasks/{id}/markProcessing.{_format}',
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
