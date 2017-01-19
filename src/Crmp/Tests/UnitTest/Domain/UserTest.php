<?php


namespace Crmp\Tests\UnitTest\Domain;


use Crmp\Domain\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    protected $user;

    /**
     * Fields
     *
     * - Username
     *
     */
    public function testItHasUsername()
    {
        $this->assertEquals($this->userUsername, $this->user->getUsername());
    }

    protected function setUp()
    {
        $this->user = new User(
            $this->userUsername = uniqid()
        );
    }

}
