<?php

namespace Crmp\BaseBundle\Tests\UnitTests\Controller\DefaultController;

use Crmp\BaseBundle\Controller\DefaultController;

class IndexActionTest extends \PHPUnit_Framework_TestCase
{
    protected $controllerClass = DefaultController::class;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    protected $controllerMock;

    public function testItRendersTheIndexTemplate()
    {
        $expectedReturn = uniqid();

        $this->controllerMock->expects($this->once())
            ->method('render')
            ->with('PHPUnit_Framework_MockObject_MockObject')
            ->willReturn($expectedReturn);

        $this->assertEquals($expectedReturn, $this->controllerMock->indexAction());
    }

    protected function setUp()
    {
        $this->controllerMock = $this->getMockBuilder($this->controllerClass)
            ->setMethods($this->getMockedMethods())
            ->getMock();
    }

    /**
     * @return array
     */
    protected function getMockedMethods()
    {
        return [
            'render',
        ];
    }


}
