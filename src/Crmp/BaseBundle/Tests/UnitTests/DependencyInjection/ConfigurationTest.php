<?php

namespace Crmp\BaseBundle\Tests\UnitTests\DependencyInjection;

use Crmp\BaseBundle\DependencyInjection\Configuration;

class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @testdox The config root is "crmp_base".
     */
    public function testItHasARootNode()
    {
        $config = new Configuration();

        $tree = $config->getConfigTreeBuilder()->buildTree();

        $this->assertEquals('crmp_base', $tree->getName());
    }
}
