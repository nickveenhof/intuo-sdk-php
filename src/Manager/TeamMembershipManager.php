<?php

namespace NickVeenhof\IntuoClient\Manager;

use NickVeenhof\IntuoClient\Entity\TeamMembership;
use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use GuzzleHttp\Psr7\Request;

class TeamMembershipManager extends ManagerBase
{
  /**
   * {@inheritdoc}
   */
  protected $queryParameters = [
    'page' => 0,
    'per_page' => 25,
    'user_email' => null,
    'team_id' => null,
    'team_type' => null,
  ];

  /**
   * Get a list of Team Memberships.
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
   * @return \NickVeenhof\IntuoClient\Entity\TeamMembership[]
   */
  public function query($options = [])
  {
    $url = '/public/team_memberships';
    $url .= $this->getQueryString($options);

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    // Get them as User objects
    $users = [];
    foreach ($data['team_memberships'] as $dataItem) {
      $users[] = new TeamMembership($dataItem);
    }

    return $users;
  }

  /**
   * Get a specific team membership.
   *
   * @see https://intuo.readme.io/v1.0/reference#praisesid
   *
   * @param int $id
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *
   * @return \NickVeenhof\IntuoClient\Entity\TeamMembership
   */
  public function get($id)
  {
    $url = "/public/team_memberships/{$id}";

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    return new TeamMembership($data['team_membership']);
  }
}
