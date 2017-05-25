<?php


namespace Crmp\BaseBundle\Tests\UnitTests\Entity;


use Crmp\BaseBundle\Entity\Address;
use Crmp\BaseBundle\Tests\UnitTestCase;

class AddressTest extends UnitTestCase
{
    public function testTheSuperAddressIsItselfForRootNodes()
    {
        $address = new Address('superduper', true);

        static::assertEquals($address, $address->getRoot());
    }
}
