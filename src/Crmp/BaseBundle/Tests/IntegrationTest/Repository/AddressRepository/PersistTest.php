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

        $repo->persistAsFirstChild($address);
        $repo->flush($address);

        // $repo->removeFromTree($address);
    }
}
