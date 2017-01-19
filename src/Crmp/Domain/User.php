<?php


namespace Crmp\Domain;


use Ramsey\Uuid\Uuid;

class User
{
    /**
     * Namespace for UUIDs of users.
     *
     * The namespaces can be generated using:
     *
     * - NIL
     * - Crmp
     * - Domain
     * - User
     */
    const UUID_NS = '9bc10ae5-6f28-506c-9d77-26af94a3554b';

    /**
     * Name of the user.
     *
     * @var string
     */
    protected $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    /**
     * Get UUID for user.
     *
     * The UUID is determined using the username.
     *
     * @return string
     */
    public function getUuid()
    {
        return Uuid::uuid5(static::UUID_NS, $this->getUserName());
    }

    public function getUserName()
    {
        return $this->username;
    }

}
