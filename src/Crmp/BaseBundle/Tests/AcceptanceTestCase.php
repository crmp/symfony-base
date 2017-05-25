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
        if ( ! self::$kernel || ! self::$kernel->getContainer()) {
            static::bootKernel();
        }

        return self::$kernel->getContainer();
    }

    public static function assertServiceInstanceOf($expectedClass, $serviceName)
    {
        static::assertInstanceOf($expectedClass, static::getContainer()->get($serviceName));
    }
}
