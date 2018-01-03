<?php

namespace NickVeenhof\IntuoClient;

use NickVeenhof\IntuoClient\Manager\PraiseManager;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use NickVeenhof\IntuoClient\Manager\TeamManager;
use NickVeenhof\IntuoClient\Manager\TeamMembershipManager;
use NickVeenhof\IntuoClient\Manager\UserManager;
use Psr\Http\Message\RequestInterface;

class Intuo
{
    /**
     * @var \GuzzleHttp\ClientInterface Authenticated client
     */
    private $authenticatedClient;

    /**
     * Constructor.
     *
     * @param string $api_token The Intuo API Token. Eg.: abcdef
     * @param array  $config     Additional configs
     */
    public function __construct(
      $api_token,
      array $config = []
    ) {
        // "base_url" parameter changed to "base_uri" in Guzzle6, so the following line
        // is there to make sure it does not disrupt previous configuration.
        if (!isset($config['base_uri']) && isset($config['base_url'])) {
            $config['base_uri'] = $config['base_url'];
        }

        // Setting up the headers.
        $config['headers']['Content-Type'] = 'application/json';
        // Accept is required based on http://helpdesk.intuo.io/admin/technical/using-the-intuo-api
        $config['headers']['Accept'] = 'application/json; version=1';

        // Create both unauthenticated and authenticated handler stacks.
        $handlerStack = isset($config['handler']) ? $config['handler'] : HandlerStack::create();
        $apiTokenHandler = $this->getApiTokenHandler($api_token);
        $handlerStack->push($apiTokenHandler, 'intuo_api_token');

        // Create handler
        $config['handler'] = $handlerStack;
        $this->authenticatedClient = new Client($config);
    }

    /**
     * Get a handler that adds intuo api token
     *
     * @param string $api_token    The Intuo Api Token
     * @return \Closure The handler that adds Intuo token to the request
     */
    private function getApiTokenHandler($api_token)
    {
        // We cannot keep references in such functions.
        return function (callable $handler) use ($api_token) {
            return function (
              RequestInterface $request,
              array $options
            ) use ($handler, $api_token) {
                $request = $request->withAddedHeader('X-Public-Token', $api_token);
                return $handler($request, $options);
            };
        };
    }

    /**
     * Get the Praise Manager.
     *
     * @return \NickVeenhof\IntuoClient\Manager\PraiseManager
     */
    public function getPraiseManager()
    {
        return new PraiseManager($this->authenticatedClient);
    }

  /**
   * Get the Team Manager.
   *
   * @return \NickVeenhof\IntuoClient\Manager\TeamManager
   */
  public function getTeamManager()
  {
    return new TeamManager($this->authenticatedClient);
  }

  /**
   * Get the Team Membership Manager.
   *
   * @return \NickVeenhof\IntuoClient\Manager\TeamMembershipManager
   */
  public function getTeamMembershipManager()
  {
    return new TeamMembershipManager($this->authenticatedClient);
  }

  /**
   * Get the User Manager.
   *
   * @return \NickVeenhof\IntuoClient\Manager\UserManager
   */
  public function getUserManager()
  {
    return new UserManager($this->authenticatedClient);
  }

}
