<?php


namespace Crmp\Tests\UnitTest\Domain;


use Crmp\Domain\User;
use Crmp\Tests\UnitTest\DomainTestCase;
use Ramsey\Uuid\Uuid;

class UserTest extends DomainTestCase
{
    /**
     * @var User
     */
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

    public function testTheUuidUsesUsername()
    {
        $this->assertEquals(
            Uuid::uuid5(User::UUID_NS, $this->user->getUserName())->toString(),
            $this->user->getUuid()
        );
    }

    protected function setUp()
    {
        $this->user = new User(
            $this->userUsername = uniqid()
        );
    }

}
