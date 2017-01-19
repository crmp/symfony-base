<?php


namespace Crmp\Tests\UnitTest;


use Crmp\Tests\UnitTestCase;
use Ramsey\Uuid\Uuid;

class DomainTestCase extends UnitTestCase
{
    public function assertUuidNamespace($expectedNamespaces, $current)
    {
        $namespace = Uuid::NIL;

        foreach (['Crmp', 'Domain'] as $item) {
            $namespace = Uuid::uuid5($namespace, $item)->toString();
        }

        foreach ($expectedNamespaces as $item) {
            $namespace = Uuid::uuid5($namespace, $item)->toString();
        }

        $this->assertEquals($namespace, $current);
    }
}
