<?php


namespace Crmp\BaseBundle\Entity\Address;

use Crmp\BaseBundle\Entity\Address;
use Ramsey\Uuid\Uuid;

/**
 * AccessKey
 *
 * @package Crmp\BaseBundle\Entity\Address
 */
class AccessKey
{
    /**
     * @var string
     */
    protected $publicKey;

    /**
     * @var string
     */
    protected $privateKey;

    /**
     * @var Address
     */
    protected $address;

    /**
     * @var string
     */
    protected $uuid;

    /**
     * AccessKey constructor.
     *
     * @param string $publicKey
     * @param string $privateKey
     */
    public function __construct($publicKey, $privateKey)
    {
        $this->publicKey = $publicKey;
        $this->privateKey = $privateKey;
    }

    /**
     * @return string
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @return string
     */
    public function getPrivateKey()
    {
        return $this->privateKey;
    }

    /**
     * Read UUID4.
     *
     * @return \Ramsey\Uuid\UuidInterface|string
     */
    public function getUuid()
    {
        if ($this->uuid) {
            return $this->uuid;
        }

        return $this->uuid = Uuid::uuid4();
    }
}
