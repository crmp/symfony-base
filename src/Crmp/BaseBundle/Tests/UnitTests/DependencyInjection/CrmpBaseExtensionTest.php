<?php

namespace Crmp\BaseBundle\Tests\UnitTests\DependencyInjection;

use Crmp\BaseBundle\DependencyInjection\CrmpBaseExtension;
use Crmp\BaseBundle\Tests\UnitTests\ExtensionStub;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * CrmpBaseExtensionTest
 *
 * @see CrmpBaseExtension
 *
 * @package Crmp\BaseBundle\Tests\UnitTests\DependencyInjection
 */
class CrmpBaseExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testItRegistersTheServiceConfig()
    {
        $container = new ContainerBuilder();

        $extension = new CrmpBaseExtension();
        $extension->load([], $container);

        $this->assertArraySubset([], $container->getDefinitions());
    }

    public function getConfigMap()
    {
        return [
            [
                'assetic',
                [
                    'filters' => [
                        'scssphp' => [],
                        'jsqueeze' => null,
                    ],
                ],
            ],
        ];
    }

    /**
     * @dataProvider getConfigMap
     */
    public function testItPrependsConfigs($extensionName, $minimalConfig)
    {
        $containerBuilder = $this->getMockBuilder(ContainerBuilder::class)
            ->setMethods(['hasExtension', 'getExtension'])
            ->getMock();

        $containerBuilder->expects($this->any())
            ->method('hasExtension')
            ->willReturn(true);

        $containerBuilder->expects($this->any())
            ->method('getExtension')
            ->willReturnCallback(
                function ($extension) {
                    return new ExtensionStub($extension);
                }
            );

        $extension = new CrmpBaseExtension();

        $extension->prepend($containerBuilder);

        /** @var ContainerBuilder $containerBuilder */
        $extensionConfig = $containerBuilder->getExtensionConfig($extensionName);

        $this->assertArraySubset($minimalConfig, current($extensionConfig));
    }
}
