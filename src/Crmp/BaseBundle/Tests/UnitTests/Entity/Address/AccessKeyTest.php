<?php


namespace Crmp\BaseBundle\Tests\UnitTests\Entity\Address;


use Crmp\BaseBundle\Entity\Address\AccessKey;
use Crmp\BaseBundle\Tests\UnitTestCase;

class AccessKeyTest extends UnitTestCase
{
    /**
     * @var AccessKey
     */
    protected $accessKey;

    protected $publicKey;

    protected $privateKey;

    protected function setUp()
    {
        $this->accessKey = new AccessKey(
            $this->publicKey = uniqid('pub', true),
            $this->privateKey = uniqid('priv', true)
        );
    }

    /**
     * Fields
     *
     * Has UUID4.
     */
    public function testUuid()
    {
        static::assertNotEmpty($previous = $this->accessKey->getUuid());
        static::assertEquals($previous, $this->accessKey->getUuid());
    }

    public function testHasPublicKey()
    {
        static::assertEquals($this->publicKey, $this->accessKey->getPublicKey());
    }

    public function testHasPrivateKey()
    {
        static::assertEquals($this->privateKey, $this->accessKey->getPrivateKey());
    }
}
