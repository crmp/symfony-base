<?php


namespace Crmp\Domain;


use Ramsey\Uuid\Uuid;

class Customer
{
    /**
     * Namespace for UUIDs of customers.
     */
    const UUID_NS = '6a31bdde-c213-5dde-97ea-46172d2e2693';

    /**
     * @var string
     */
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

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
