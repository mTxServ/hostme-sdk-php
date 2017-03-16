<?php

namespace HostMe\Brige\Symfony\Security\Provider;

use HostMe\Brige\Symfony\Security\Model\User;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class TokenProvider.
 */
class TokenProvider implements UserProviderInterface
{
    /**
     * @var string
     */
    private $endpoint;

    /**
     * TokenProvider constructor.
     *
     * @param string $endpoint
     */
    public function __construct($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @param string $username
     *
     * @throws UsernameNotFoundException
     *
     * @return User
     */
    public function loadUserByUsername($username)
    {
        $userData = @file_get_contents(sprintf('%s?access_token=%s', $this->endpoint, $username));

        if (false !== $userData) {
            $userData = json_decode($userData, true);
            if (!empty($userData['id']) && !empty($userData['roles'])) {
                return new User($userData['id'], $userData['id'], $userData['roles']);
            }
        }

        throw new UsernameNotFoundException(
            sprintf('Authentification failed.')
        );
    }

    /**
     * @param UserInterface $user
     *
     * @throws UnsupportedUserException
     * @throws UsernameNotFoundException
     *
     * @return User
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * @param $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return User::class === $class;
    }
}
