<?php

namespace Crmp\BaseBundle\Repository;

use Crmp\BaseBundle\Entity\Address;
use Crmp\Domain\Address as DomainAddress;
use Crmp\Domain\AddressRepositoryInterface;
use Doctrine\ORM\EntityManager;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;

/**
 * Repository for addresses.
 *
 * @package Crmp\BaseBundle\Repository
 */
class AddressRepository implements AddressRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * AddressRepository constructor.
     *
     * @param EntityManager        $entityManager
     * @param NestedTreeRepository $repository
     */
    public function __construct(EntityManager $entityManager, NestedTreeRepository $repository)
    {
        $this->repository    = $repository;
        $this->entityManager = $entityManager;
    }

    /**
     * Find an address by identifier.
     *
     * @throws \Doctrine\ORM\TransactionRequiredException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\ORMInvalidArgumentException
     * @throws \Doctrine\ORM\ORMException
     *
     * @param string $uuid
     *
     * @return \Crmp\BaseBundle\Entity\Address|null Returns the address or null if not found.
     *
     */
    public function find($uuid)
    {
        return $this->entityManager->find(Address::class, $uuid);
    }

    /**
     * Store or update an address.
     *
     * Addresses with an ID will be updated.
     * Those with no id will be created.
     *
     * @param DomainAddress $address
     *
     * @return void
     */
    public function persist(DomainAddress $address)
    {
        $this->repository->persistAsLastChild($address);
    }

    /**
     * Write changes to persistence.
     *
     * @param Address|null $address
     */
    public function flush(Address $address = null)
    {
        $this->entityManager->flush($address);
    }

    /**
     * Delete an address.
     *
     * @param Address $address
     */
    public function remove(Address $address)
    {
        $this->repository->removeFromTree($address);
    }
}
