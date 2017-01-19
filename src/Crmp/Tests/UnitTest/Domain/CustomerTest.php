<?php


namespace Crmp\Tests\UnitTest\Domain;


use Crmp\Domain\Customer;
use Crmp\Tests\UnitTest\DomainTestCase;
use Ramsey\Uuid\Uuid;

class CustomerTest extends DomainTestCase
{
    /**
     * @var Customer
     */
    protected $customer;
    protected $customerName;

    /**
     * Fields
     *
     * - Name
     *
     */
    public function testItHasName()
    {
        $this->assertEquals($this->customerName, $this->customer->getName());
    }

    public function testItHasAnUuid()
    {
        $this->assertUuidNamespace(
            ['Customer'],
            Customer::UUID_NS
        );

        $this->assertUuid(
            $this->customerName,
            Customer::UUID_NS,
            $this->customer->getUuid()
        );
    }

    protected function assertUuid($expected, $namespace, $currentUuid)
    {
        $this->assertEquals(
            Uuid::uuid5($namespace, $expected),
            $currentUuid
        );
    }

    protected function setUp()
    {
        $this->customer = new Customer(
            $this->customerName = uniqid('name')
        );

        parent::setUp();
    }

}
