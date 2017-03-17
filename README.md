HostMe SDK for PHP
-----------------

The **HostMe SDK for PHP** enables PHP developers to easily integrate our API into your applications.

**NOTE**: This library is under heavy development and a lot of calls haven't been implemented yet. We're looking forward to any of your PR's.

# Install
We recommend Composer for managing dependencies. Installing is as easy as:

    $ composer require "hostme/php-sdk:1.0.*@dev"

# Usage


```
<?php
$config = [
    // ...
];

$client = new \HostMe\Client($config);
```

# Configuration Reference


```
<?php
$config = [
    'oauth' => [
        'oauth_endpoint' => 'https://.../oauth/v2/token',
        'client_id' => '123',
        'client_secret' => 's$cr$t',
        'api_key' => 's$cr$t123',
    ],
    'box_endpoint' => 'https://.../',
    'user_endpoint' => 'https://.../',
    'app_endpoint' => 'https://.../',
    'task_endpoint' => 'https://.../',
    'platform_endpoint' => 'https://.../api/',        
];
```

# Brige Symfony

```
services:
    app.token_authenticator:
        class: HostMe\Brige\Symfony\Security\Guard\TokenAuthenticator

    app.token_provider:
        class: HostMe\Brige\Symfony\Security\Provider\TokenProvider
        arguments:
            - "%user.endpoint%"

```

```
# To get started with security, check out the documentation:
# http://symfony.com/doc/current/book/security.html
security:
    # http://symfony.com/doc/current/book/security.html#where-do-users-come-from-user-providers
    providers:
        token:
            id: app.token_provider

    firewalls:
        # disables authentication for assets and the profiler, adapt it according to your needs
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false

        main:
            anonymous: ~
            logout: ~
            guard:
                authenticators:
                    - app.token_authenticator
            stateless: true

    access_control:
        - { path: ^/, roles: [ ROLE_API ] }
```
