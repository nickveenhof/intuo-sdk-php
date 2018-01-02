<?php

namespace NickVeenhof\IntuoClient\Test\Entity;

use NickVeenhof\IntuoClient\Entity\Praise;

class PraiseTest extends \PHPUnit_Framework_TestCase
{

  public function testId()
  {
    $entity = new Praise();
    $entity->setId(10);
    $this->assertEquals($entity->getId(), 10);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of int.
   */
  public function testIdNoNumeric()
  {
    $entity = new Praise();
    $entity->setId('string');
  }

  public function testSenderId()
  {
    $entity = new Praise();
    $entity->setSenderId(10);
    $this->assertEquals($entity->getSenderId(), 10);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of int.
   */
  public function testSenderIdNoNumeric()
  {
    $entity = new Praise();
    $entity->setSenderId('string');
  }

  public function testReceiverId()
  {
    $entity = new Praise();
    $entity->setReceiverId(10);
    $this->assertEquals($entity->getReceiverId(), 10);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of int.
   */
  public function testReceiverIdNoNumeric()
  {
    $entity = new Praise();
    $entity->setReceiverId('string');
  }

  public function testTeamId()
  {
    $entity = new Praise();
    $entity->setTeamId(10);
    $this->assertEquals($entity->getTeamId(), 10);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of int.
   */
  public function testTeamIdNoNumeric()
  {
    $entity = new Praise();
    $entity->setTeamId('string');
  }

  public function testPerformanceDriverIds()
  {
    $entity = new Praise();
    $entity->setPerformanceDriverIds([1]);
    $this->assertEquals($entity->getPerformanceDriverIds(), [1]);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Performance Driver Ids argument is more than 1 level deep.
   */
  public function testPerformanceDriverIdsArrayTwoLevels()
  {
    $entity = new Praise();
    $entity->setPerformanceDriverIds([10 => [2]]);
  }

  public function testTextContent()
  {
    $entity = new Praise();
    $entity->setTextContent('great work!');
    $this->assertEquals($entity->getTextContent(), 'great work!');
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of string.
   */
  public function testTextContentNoString()
  {
    $entity = new Praise();
    $entity->setTextContent(123);
  }

  public function testBucketId()
  {
    $entity = new Praise();
    $entity->setBucketId(10);
    $this->assertEquals($entity->getBucketId(), 10);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of int.
   */
  public function testBucketIdNoNumeric()
  {
    $entity = new Praise();
    $entity->setBucketId('string');
  }

  public function testLikesCount()
  {
    $entity = new Praise();
    $entity->setLikesCount(10);
    $this->assertEquals($entity->getLikesCount(), 10);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of int.
   */
  public function testLikesCountNoNumeric()
  {
    $entity = new Praise();
    $entity->setLikesCount('string');
  }

  public function testCommentsCount()
  {
    $entity = new Praise();
    $entity->setCommentCount(10);
    $this->assertEquals($entity->getCommentCount(), 10);
  }

  /**
   * @expectedException     \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   * @expectedExceptionMessage Argument must be an instance of int.
   */
  public function testCommentCountNoNumeric()
  {
    $entity = new Praise();
    $entity->setCommentCount('string');
  }
}
