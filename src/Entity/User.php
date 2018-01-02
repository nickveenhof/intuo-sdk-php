<?php

namespace NickVeenhof\IntuoClient\Entity;

use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use NickVeenhof\IntuoClient\Utility\Utility;

class User extends Entity
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
   * @return \NickVeenhof\IntuoClient\Entity\User
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
   * Sets the 'email' parameter.
   *
   * @param string $email
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\User
   */
  public function setEmail($email)
  {
    if (!is_string($email)) {
      throw new IntuoSdkException('Argument must be an instance of string.');
    }
    $this['email'] = $email;

    return $this;
  }

  /**
   * Gets the 'email' parameter.
   *
   * @return string The Content of the User
   */
  public function getEmail()
  {
    return $this->getEntityValue('email', '');
  }

  /**
   * Sets the 'first_name' parameter.
   *
   * @param string $firstName
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\User
   */
  public function setFirstName($firstName)
  {
    if (!is_string($firstName)) {
      throw new IntuoSdkException('Argument must be an instance of string.');
    }
    $this['first_name'] = $firstName;

    return $this;
  }

  /**
   * Gets the 'first_name' parameter.
   *
   * @return string The Content of the User
   */
  public function getFirstName()
  {
    return $this->getEntityValue('first_name', '');
  }

  /**
   * Sets the 'last_name' parameter.
   *
   * @param string $lastName
   *
   * @throws \NickVeenhof\IntuoClient\Exception\IntuoSdkException
   *
   * @return \NickVeenhof\IntuoClient\Entity\User
   */
  public function setLastName($lastName)
  {
    if (!is_string($lastName)) {
      throw new IntuoSdkException('Argument must be an instance of string.');
    }
    $this['last_name'] = $lastName;

    return $this;
  }

  /**
   * Gets the 'last_name' parameter.
   *
   * @return string The Content of the praise
   */
  public function getLastName()
  {
    return $this->getEntityValue('last_name', '');
  }

}
