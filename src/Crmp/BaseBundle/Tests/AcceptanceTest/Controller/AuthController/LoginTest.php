<?php


namespace Crmp\BaseBundle\Tests\AcceptanceTest\Controller\AuthController;


use Crmp\BaseBundle\Tests\AcceptanceTestCase;
use Symfony\Component\HttpFoundation\Request;

class LoginTest extends AcceptanceTestCase
{
    public function testIsPublic()
    {
        $client = static::createClient();

        $client->request(Request::METHOD_GET, '/auth/login');

        static::assertTrue($client->getResponse()->isSuccessful());
    }
}
