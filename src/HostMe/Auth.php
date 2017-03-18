<?php

namespace HostMe;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use HostMe\Exception\AuthenficaitionFailedException;
use HostMe\Exception\EmptyAccessTokenException;

/**
 * Class Auth.
 */
class Auth
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * Auth constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'oauth_endpoint' => 'http://user-dev.hostme.fr:82/app_dev.php/oauth/v2/token',
            'client_id' => '123',
            'client_secret' => 's$cr$t',
            'api_key' => 's$cr$t123',
        ], $config);
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        if (!$this->accessToken) {
            $this->accessToken = $this->createAccessToken();
        }

        return $this->accessToken;
    }

    /**
     * @throws AuthenficaitionFailedException
     * @throws EmptyAccessTokenException
     *
     * @return string
     */
    private function createAccessToken()
    {
        try {
            $client = new GuzzleClient([
                'base_uri' => $this->config['oauth_endpoint'],
                'defaults' => [
                    'headers' => [
                        'Content-Type' => 'application/json', ],
                ],
            ]);

            $response = $client->get(
                sprintf('/oauth/v2/token?%s', http_build_query([
                    'grant_type' => 'https://user.hostme.fr/api_key',
                    'client_id' => $this->config['client_id'],
                    'client_secret' => $this->config['client_secret'],
                    'api_key' => $this->config['api_key'],
                ]))
            );
        } catch (ClientException $clientException) {
            throw new AuthenficaitionFailedException(sprintf('Authentification Failed: %s', $clientException->getMessage()));
        }

        $data = json_decode($response->getBody()->getContents(), true);

        if (empty($data['access_token'])) {
            throw new EmptyAccessTokenException();
        }

        return $data['access_token'];
    }
}
