<?php


namespace Crmp\BaseBundle\TestsIntegraionTest\Repository\AddressRepository;


use Crmp\BaseBundle\Entity\Address;
use Crmp\BaseBundle\Repository\AddressRepository;
use Crmp\BaseBundle\Tests\IntegrationTestCase;

class PersistTest extends IntegrationTestCase
{
    public function testItCanPersistNewAddresses()
    {
        $address = new Address(uniqid('name', true));

        /** @var AddressRepository $repo */
        $repo = $this->getContainer()->get(AddressRepository::class);

        $repo->persist($address);
        $repo->flush($address);

        $loaded = $repo->find($address->getUuid());

        static::assertEquals($address, $loaded);

        $repo->remove($address);
        $repo->flush($address);
    }
}
