<?php

namespace HostMe\Exception;

/**
 * Class EmptyAccessTokenException.
 */
class EmptyAccessTokenException extends HostMeException
{
    protected $message = 'Authentification Failed: empty access_token';
}
