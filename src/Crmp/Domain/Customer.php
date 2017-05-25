<?php


namespace Crmp\Domain;

use Ramsey\Uuid\Uuid;

/**
 * Customer
 *
 * @package Crmp\Domain
 */
class Customer
{
    /**
     * Namespace for UUIDs of customers.
     *
     * The namespace is generated using:
     *
     * - Crmp
     * - Domain
     * - Customer
     */
    const UUID_NS = '6a31bdde-c213-5dde-97ea-46172d2e2693';

    /**
     * @var string
     */
    protected $name;

    /**
     * Create customer by name.
     *
     * @param string $name Name of the customer.
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * UUID5 by name.
     *
     * @return \Ramsey\Uuid\UuidInterface
     */
    public function getUuid()
    {
        return Uuid::uuid5(static::UUID_NS, $this->getName());
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
