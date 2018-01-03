<?php

namespace NickVeenhof\IntuoClient\Manager;

use NickVeenhof\IntuoClient\Entity\User;
use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use GuzzleHttp\Psr7\Request;

class UserManager extends ManagerBase
{
  /**
   * {@inheritdoc}
   */
  protected $queryParameters = [
    'page' => 0,
    'email' => null,
  ];

  /**
   * Get a list of Users.
   *
   * Example of how to structure the $options parameter:
   * <code>
   * $options = [
   *     'page'  => 1,
   * ];
   * </code>
   *
   * @see https://intuo.readme.io/v1.0/reference#praises
   *
   * @param array $options
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *
   * @return \NickVeenhof\IntuoClient\Entity\User[]
   */
  public function query($options = [])
  {
    $url = '/public/users';
    $url .= $this->getQueryString($options);

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    // Get them as User objects
    $users = [];
    foreach ($data['users'] as $dataItem) {
      $users[] = new User($dataItem);
    }

    return $users;
  }

  /**
   * Get a specific User.
   *
   * @see https://intuo.readme.io/v1.0/reference#praisesid
   *
   * @param int $id
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *
   * @return \NickVeenhof\IntuoClient\Entity\User
   */
  public function get($id)
  {
    $url = "/public/users/{$id}";

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    return new User($data['user']);
  }
}
