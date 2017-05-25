<?php


namespace Crmp\BaseBundle\Tests\AcceptanceTest\Controller;


use Crmp\BaseBundle\Controller\AuthController;
use Crmp\BaseBundle\Tests\AcceptanceTestCase;

class AuthControllerTest extends AcceptanceTestCase
{
    public function testControllerExistsAsService()
    {
        static::assertServiceInstanceOf(AuthController::class, AuthController::class);
    }
}
