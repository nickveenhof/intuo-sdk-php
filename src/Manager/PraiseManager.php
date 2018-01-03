<?php

namespace NickVeenhof\IntuoClient\Manager;

use NickVeenhof\IntuoClient\Entity\Praise;
use NickVeenhof\IntuoClient\Exception\IntuoSdkException;
use GuzzleHttp\Psr7\Request;

class PraiseManager extends ManagerBase
{
  /**
   * {@inheritdoc}
   */
  protected $queryParameters = [
    'page' => 0,
    'per_page' => 25,
    'start_date' => null,
    'end_date' => null,
  ];

  /**
   * Get a list of Praises.
   *
   * Example of how to structure the $options parameter:
   * <code>
   * $options = [
   *     'page'  => 1,
   *     'per_page'  => 25,
   * ];
   * </code>
   *
   * @see https://intuo.readme.io/v1.0/reference#praises
   *
   * @param array $options
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise[]
   */
  public function query($options = [])
  {
    $url = '/public/praises';
    $url .= $this->getQueryString($options);

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    // Get them as Praise objects
    $praises = [];
    foreach ($data['praises'] as $dataItem) {
      $praises[] = new Praise($dataItem);
    }

    $praises['meta'] = $data['meta'];

    return $praises;
  }

  /**
   * Get a specific praise.
   *
   * @see https://intuo.readme.io/v1.0/reference#praisesid
   *
   * @param int $id
   *
   * @throws \GuzzleHttp\Exception\RequestException
   *
   * @return \NickVeenhof\IntuoClient\Entity\Praise
   */
  public function get($id)
  {
    $url = "/public/praises/{$id}";

    // Now make the request.
    $request = new Request('GET', $url);
    $data = $this->getResponseJson($request);

    return new Praise($data['praise']);
  }
}
