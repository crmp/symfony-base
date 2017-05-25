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

    public function testHasDeepLevelWithSuperordinate()
    {
        $root = new Address('root', true);
        $child = new Address('root', true, $root);
        $childchild = new Address('root', true, $child);

        static::assertNotNull($child->getSuperordinateAddress());
        static::assertEquals($root, $child->getSuperordinateAddress());
        static::assertEquals(1, $child->getLevel());
        static::assertEquals($root, $child->getRoot());

        static::assertNotNull($childchild->getSuperordinateAddress());
        static::assertEquals($child, $childchild->getSuperordinateAddress());
        static::assertEquals(2, $child->getLevel());
        static::assertEquals($root, $childchild->getRoot());
    }

    public function testHasAccessKeys()
    {
        $address = new Address('address', true);

        $address->addAccessKey($first = new Address\AccessKey(uniqid('pub', true), uniqid('priv', true)));
        $address->addAccessKey($second = new Address\AccessKey(uniqid('pub', true), uniqid('priv', true)));

        static::assertEquals([$first, $second], $address->getAccessKeys());
    }
}
