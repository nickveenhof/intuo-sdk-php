<?php

namespace NickVeenhof\IntuoClient\Test\Entity;

use NickVeenhof\IntuoClient\Entity\Entity;
use ReflectionClass;

class EntityTest extends \PHPUnit_Framework_TestCase
{
    public function testgetEntityValue()
    {
        $class = new ReflectionClass('NickVeenhof\IntuoClient\Entity\Entity');
        $method = $class->getMethod('getEntityValue');
        $method->setAccessible(true);
        // Test our protected method
        $entity = new Entity(['foo' => 'bar']);
        $this->assertEquals($method->invokeArgs($entity, array('foo', '')), 'bar');
    }

    public function testJson()
    {
        $entity = new Entity(['foo' => 'bar']);
        $this->assertEquals($entity->json(), '{"foo":"bar"}');
    }
}
