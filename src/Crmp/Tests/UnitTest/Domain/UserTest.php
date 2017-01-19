<?php


namespace Crmp\Tests\UnitTest\Domain;


use Crmp\Domain\User;
use Crmp\Tests\UnitTest\DomainTestCase;

class UserTest extends DomainTestCase
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

    public function testItHasAnUuid()
    {
        $this->assertUuid(['User'], User::UUID_NS);
    }

    protected function setUp()
    {
        $this->user = new User(
            $this->userUsername = uniqid()
        );
    }

}
