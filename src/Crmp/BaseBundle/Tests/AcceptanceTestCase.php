<?php


namespace Crmp\BaseBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class AcceptanceTestCase extends WebTestCase
{
    /**
     * @var ContainerInterface
     */
    protected static $container = null;

    protected static function getContainer()
    {
        self::assertKernel();

        return self::$kernel->getContainer();
    }

    protected static function assertServiceInstanceOf($expectedClass, $serviceName)
    {
        static::assertInstanceOf($expectedClass, static::getContainer()->get($serviceName));
    }

    protected static function assertKernel()
    {
        if ( self::$kernel && self::$kernel->getContainer()) {
            return;
        }

        static::bootKernel();
    }
}
