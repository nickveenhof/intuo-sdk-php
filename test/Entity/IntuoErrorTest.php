<?php

namespace NickVeenhof\IntuoClient\Test\Entity;

use NickVeenhof\IntuoClient\Entity\IntuoError;

class IntuoErrorTest extends \PHPUnit_Framework_TestCase
{
    public function testCodeAndMessage()
    {
        $entity = new IntuoError(['code' => 'INVALID_UID', 'message' => 'something went wrong']);
        $this->assertEquals($entity->getCode(), 'INVALID_UID');
        $this->assertEquals($entity->getMessage(), 'something went wrong');

        $entity = new IntuoError(['code' => 200, 'message' => 'something went wrong']);
        $this->assertEquals($entity->getCode(), '200');
        $this->assertEquals($entity->getMessage(), 'something went wrong');
    }
}
