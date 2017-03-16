<?php

namespace HostMe\Box;

use GuzzleHttp\Command\Guzzle\Description;

/**
 * Class BoxDescription.
 */
final class BoxDescription extends Description
{
    /**
     * BoxDescription constructor.
     *
     * @param array $config
     * @param array $options
     */
    public function __construct(array $config = [], array $options = [])
    {
        $config = array_merge([
            'name' => 'Box API',

            'operations' => [
                'newBuild' => [
                    'httpMethod' => 'POST',
                    'uri' => 'builds',
                    'responseModel' => 'getResponse',
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
