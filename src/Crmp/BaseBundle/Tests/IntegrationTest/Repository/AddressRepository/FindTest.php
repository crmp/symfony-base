<?php

namespace Crmp\BaseBundle\Tests\IntegrationTest\Repository\AddressRepository;

use Crmp\BaseBundle\Entity\Address;
use Crmp\BaseBundle\Repository\AddressRepository;
use Crmp\BaseBundle\Tests\IntegrationTest\Repository\AbstractRepositoryTest;

class FindTest extends AbstractRepositoryTest
{
    /**
     * @var Address
     */
    protected $addressSun;

    public function testLoadsByUuid()
    {
        static::assertEquals(static::ADDRESS_SUN_UUID, $this->addressSun->getUuid());
    }

    public function testLoadsChildren()
    {
        static::assertNotEmpty($this->addressSun->getSubAddresses());

        foreach ($this->addressSun->getSubAddresses() as $subAddress) {
            static::assertInstanceOf(Address::class, $subAddress);
        }
    }

    protected function setUp()
    {
        parent::setUp();

        $this->addressSun = $this->getRepository()->find(static::ADDRESS_SUN_UUID);
    }

    /**
     * @return AddressRepository|object
     */
    private function getRepository()
    {
        return $this->getContainer()->get(AddressRepository::class);
    }
}
