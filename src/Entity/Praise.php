<?php

namespace NickVeenhof\IntuoClient\Entity;

use DateTime;
use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use NickVeenhof\IntuoClient\Utility\Utility;

class Praise extends Entity

  {
  /**
   * @param array $array
   */
  public function __construct(array $array = [])
  {
    parent::__construct($array);
  }

  /**
   * Sets the 'id' parameter.
   *
   * @param int $id
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setId($id)
  {
    if (!is_int($id)) {
      throw new IntuoSdkException('Argument must be an instance of int.');
    }

    $this['id'] = $id;

    return $this;
  }

  /**
   * Gets the 'id' parameter.
   *
   * @return int The Identifier of the Praise
   */
  public function getId()
  {
    return $this->getEntityValue('id', 0);
  }

  /**
   * Gets the 'sender_id' parameter.
   *
   * @return int|null The Sender Identifier
   */
  public function getSenderId()
  {
    return $this->getEntityValue('sender_id', null);
  }

  /**
   * Sets the 'sender_id' parameter.
   *
   * @param int|null $id
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setSenderId($id)
  {
    if (!is_int($id)) {
      throw new IntuoSdkException('Argument must be an instance of int.');
    }

    $this['sender_id'] = $id;

    return $this;
  }

  /**
   * Gets the 'receiver_id' parameter.
   *
   * @return int|null The Receiver Identifier
   */
  public function getReceiverId()
  {
    return $this->getEntityValue('receiver_id', null);
  }

  /**
   * Sets the 'receiver_id' parameter.
   *
   * @param int $id
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setReceiverId($id)
  {
    if (!is_int($id)) {
      throw new IntuoSdkException('Argument must be an instance of int.');
    }

    $this['receiver_id'] = $id;

    return $this;
  }
  
  /**
   * Gets the 'additional_receiver_ids' parameter.
   *
   * @return array The Additional Receiver Identifiers
   */
  public function getAdditionalReceiverIds()
  {
    return $this->getEntityValue('additional_receiver_ids', []);
  }

  /**
   * Gets the 'team_id' parameter.
   *
   * @return int The Team Identifier
   */
  public function getTeamId()
  {
    return $this->getEntityValue('team_id', null);
  }

  /**
   * Sets the 'team_id' parameter.
   *
   * @param int $id
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setTeamId($id)
  {
    if (!is_float($id) && !is_int($id)) {
      throw new IntuoSdkException('Argument must be an instance of int.');
    }

    $this['team_id'] = $id;

    return $this;
  }

  /**
   * Sets the 'performance_driver_ids' parameter.
   *
   * @param array $performanceDriverIds
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setPerformanceDriverIds(array $performanceDriverIds)
  {
    if (Utility::arrayDepth($performanceDriverIds) > 1) {
      throw new IntuoSdkException('Performance Driver Ids argument is more than 1 level deep.');
    }

    // Set only the array values to the rule_ids property.
    $this['performance_driver_ids'] = array_values($performanceDriverIds);

    return $this;
  }

  /**
   * Gets the 'performance_driver_ids' parameter.
   *
   * @return array The Performance Driver Ids
   */
  public function getPerformanceDriverIds()
  {
    return $this->getEntityValue('performance_driver_ids', []);
  }

  /**
   * Sets the 'liker_ids' parameter.
   *
   * @param array $performanceDriverIds
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setLikerIds(array $performanceDriverIds)
  {
    if (Utility::arrayDepth($performanceDriverIds) > 1) {
      throw new IntuoSdkException('Liker Ids argument is more than 1 level deep.');
    }

    // Set only the array values to the rule_ids property.
    $this['liker_ids'] = array_values($performanceDriverIds);

    return $this;
  }

  /**
   * Gets the 'liker_ids' parameter.
   *
   * @return array The Liker Ids
   */
  public function getLikerIds()
  {
    return $this->getEntityValue('liker_ids', []);
  }


  /**
   * Sets the 'text_content' parameter.
   *
   * @param string $description
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setTextContent($description)
  {
    if (!is_string($description)) {
      throw new IntuoSdkException('Argument must be an instance of string.');
    }
    $this['text_content'] = $description;

    return $this;
  }

  /**
   * Gets the 'text_content' parameter.
   *
   * @return string The Content of the praise
   */
  public function getTextContent()
  {
    return $this->getEntityValue('text_content', '');
  }


  /**
   * Sets the 'bucket_id' parameter.
   *
   * @param int $value
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setBucketId($value)
  {
    if (!is_int($value)) {
      throw new IntuoSdkException('Argument must be an instance of int.');
    }
    $this['bucket_id'] = $value;

    return $this;
  }

  /**
   * Gets the 'bucket_id' parameter.
   *
   * @return int
   */
  public function getBucketId()
  {
    return $this->getEntityValue('bucket_id', '');
  }

  /**
   * Sets the 'likes_count' parameter.
   *
   * @param int $value
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setLikesCount($value)
  {
    if (!is_int($value)) {
      throw new IntuoSdkException('Argument must be an instance of int.');
    }
    $this['likes_count'] = $value;

    return $this;
  }

  /**
   * Gets the 'likes_count' parameter.
   *
   * @return int
   */
  public function getLikesCount()
  {
    return $this->getEntityValue('likes_count', '');
  }

  /**
   * Sets the 'comment_count' parameter.
   *
   * @param int $value
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function setCommentCount($value)
  {
    if (!is_int($value)) {
      throw new IntuoSdkException('Argument must be an instance of int.');
    }
    $this['comment_count'] = $value;

    return $this;
  }

  /**
   * Gets the 'comment_count' parameter.
   *
   * @return int
   */
  public function getCommentCount()
  {
    return $this->getEntityValue('comment_count', '');
  }

  /**
   * Gets the 'created_at' parameter.
   *
   * @return DateTime|false
   */
  public function getCreatedAt()
  {
    $date = $this->getEntityValue('created_at', 0);
    // The ISO8601 DateTime format is not compatible with ISO-8601, but is left this way for backward compatibility
    // reasons. Use DateTime::ATOM or DATE_ATOM for compatibility with ISO-8601 instead.
    // See http://php.net/manual/en/class.datetime.php
    $datetime = new DateTime($date);

    return $datetime;
  }


}
