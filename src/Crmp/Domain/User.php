<?php


namespace Crmp\Domain;


class User
{
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

    public function getUserName()
    {
        return $this->username;
    }


}
