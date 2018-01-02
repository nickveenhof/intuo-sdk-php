<?php

namespace NickVeenhof\IntuoClient\Entity;

use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use NickVeenhof\IntuoClient\Utility\Utility;

class Team extends Entity
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
   * @return \NickVeenhof\IntuoClient\Entity\Team
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
   * @return int The Identifier of the Team
   */
  public function getId()
  {
    return $this->getEntityValue('id', 0);
  }

  /**
   * Sets the 'name' parameter.
   *
   * @param string $name
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Team
   */
  public function setName($name)
  {
    if (!is_string($name)) {
      throw new IntuoSdkException('Argument must be an instance of string.');
    }
    $this['name'] = $name;

    return $this;
  }

  /**
   * Gets the 'name' parameter.
   *
   * @return string The Content of the praise
   */
  public function getName()
  {
    return $this->getEntityValue('name', '');
  }


}
