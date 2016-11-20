<?php

namespace Crmp\BaseBundle\Tests\UnitTests;

class ExtensionStub
{
    public function __construct($alias)
    {
        $this->alias = $alias;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }
}
