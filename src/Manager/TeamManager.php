<?php

namespace NickVeenhof\IntuoClient\Manager;

use NickVeenhof\IntuoClient\Entity\Team;
use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use GuzzleHttp\Psr7\Request;

class TeamManager extends ManagerBase
{
  /**
   * {@inheritdoc}
   */
  protected $queryParameters = [
    'archived' => false,
    'team_type' => null,
  ];

  /**
   * Get a list of teams.
   *
   * Example of how to structure the $options parameter:
   * <code>
   * $options = [
   *     'archived'  => false,
   * ];
   * </code>
   *
   * @see https://intuo.readme.io/v1.0/reference#praises
   *
   * @param array $options
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Team[]
   */
  public function query($options = [])
  {
    $url = '/public/teams';
    $url .= $this->getQueryString($options);

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    // Get them as User objects
    $users = [];
    foreach ($data['teams'] as $dataItem) {
      $users[] = new Team($dataItem);
    }

    return $users;
  }

  /**
   * Get a specific team.
   *
   * @see https://intuo.readme.io/v1.0/reference#praisesid
   *
   * @param int $id
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Team
   */
  public function get($id)
  {
    $url = "/public/users/{$id}";

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    return new Team($data['team']);
  }
}
