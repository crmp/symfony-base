<?php


namespace Crmp\BaseBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class IntegrationTestCase extends KernelTestCase
{
    /**
     * @var ContainerInterface
     */
    private static $container;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::bootKernel();

        self::$container = self::$kernel->getContainer();
    }

    protected function getContainer()
    {
        return self::$container;
    }
}
