<?php

namespace HostMe\Brige\Symfony\Security\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User.
 */
class User implements UserInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var array
     */
    private $roles;

    /**
     * User constructor.
     *
     * @param int    $id
     * @param string $username
     * @param array  $roles
     */
    public function __construct($id, $username = null, array $roles = [])
    {
        $this->id = $id;
        $this->username = $username;
        $this->roles = $roles;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
    }

    public function getSalt()
    {
    }

    public function eraseCredentials()
    {
    }
}
