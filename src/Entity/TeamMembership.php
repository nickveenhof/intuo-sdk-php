<?php

namespace NickVeenhof\IntuoClient\Entity;

use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use NickVeenhof\IntuoClient\Utility\Utility;

class TeamMembership extends Entity
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
   * @return \NickVeenhof\IntuoClient\Entity\TeamMembership
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
   * Gets the 'team_id' parameter.
   *
   * @return int The Identifier of the Team
   */
  public function getTeamId()
  {
    return $this->getEntityValue('team_id', 0);
  }

  /**
   * Gets the 'user_id' parameter.
   *
   * @return int The Identifier of the Team
   */
  public function getUserId()
  {
    return $this->getEntityValue('user_id', 0);
  }

}
