<?php

namespace Crmp\BaseBundle\Repository;

use Crmp\BaseBundle\Entity\Address;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

class AddressRepository extends NestedTreeRepository implements \Crmp\Domain\AddressRepositoryInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * Find an address by identifier.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     * @throws \Doctrine\ORM\ORMException
     *
     * @param int $id
     *
     * @return \Crmp\BaseBundle\Entity\Address|null Returns the address or null if not found.
     *
     */
    public function find($id)
    {
        return $this->entityManager->find(Address::class, $id);
    }

    /**
     * Search for similar addresses.
     *
     * @param \Crmp\Domain\Address $address
     *
     * @return \Crmp\Domain\Address
     */
    public function findAllSimilar(\Crmp\Domain\Address $address)
    {
        // TODO: Implement findAllSimilar() method.
    }

    /**
     * Fetch addresses that can access an inquiry.
     *
     * @param \Crmp\Domain\Inquiry $inquiry
     *
     * @return \Crmp\Domain\Address
     */
    public function findByInquiry(\Crmp\Domain\Inquiry $inquiry)
    {
        // TODO: Implement findByInquiry() method.
    }

    /**
     * Search for one similar address.
     *
     * This uses the ::findAllSimilar method
     * and return the first match.
     *
     * @see ::findAllSimilar()
     *
     * @param \Crmp\Domain\Address $address
     *
     * @return mixed
     */
    public function findSimilar(\Crmp\Domain\Address $address)
    {
        // TODO: Implement findSimilar() method.
    }

    /**
     * Store or update an address.
     *
     * Addresses with an ID will be updated.
     * Those with no id will be created.
     *
     * @param \Crmp\Domain\Address $address
     *
     * @return mixed
     */
    public function persist(\Crmp\Domain\Address $address)
    {
        // TODO: Implement persist() method.
    }

    public function flush(Address $address = null)
    {
        $this->_em->flush($address);
    }
}
