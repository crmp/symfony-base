<?php

namespace Crmp\BaseBundle\Entity;

use Crmp\BaseBundle\Entity\Address\AccessKey;

/**
 * Address
 *
 * @package Crmp\BaseBundle\Entity
 *
 * @method Address getSuperordinateAddress()
 */
class Address extends \Crmp\Domain\Address
{
    protected $left;

    protected $level = 0;

    /**
     * @var Address|null
     */
    protected $root;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var AccessKey[]
     */
    protected $accessKeys = [];

    /**
     * @var Address|null
     */
    protected $parent;

    protected $right;

    /**
     * Address constructor.
     *
     * @param string       $name
     * @param bool         $enabled
     * @param Address|null $superAddress
     */
    public function __construct($name, $enabled = true, Address $superAddress = null)
    {
        parent::__construct($name, $enabled, $superAddress);

        if ($this->getSuperordinateAddress()) {
            $this->parent = $this->getSuperordinateAddress();
            $this->level  = (int) $this->getSuperordinateAddress()->getLevel() + 1;
        }

        $this->root = $this;
        if ($superAddress instanceof Address) {
            // Trees reference the node itself on root level.
            $this->root = $superAddress->getRoot();
        }
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return Address
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @param AccessKey $accessKey
     */
    public function addAccessKey(AccessKey $accessKey)
    {
        $this->accessKeys[] = $accessKey;
    }

    /**
     * @return AccessKey[]
     */
    public function getAccessKeys()
    {
        return $this->accessKeys;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return Address|null
     */
    public function getParent()
    {
        return $this->parent;
    }
}
