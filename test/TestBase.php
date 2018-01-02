<?php

namespace NickVeenhof\IntuoClient\Test;

use NickVeenhof\IntuoClient\Intuo;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use Psr\Http\Message\RequestInterface;

abstract class TestBase extends \PHPUnit_Framework_TestCase
{

    /**
     * @var string The Api Token we are using
     */
    protected $apiToken;

    /**
     * @var \GuzzleHttp\Handler\MockHandler The mock handler
     */
    protected $mockHandler;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->apiToken = '328a4f08413215b78870929dbdcf316c=';
    }

    /**
     * @param array $responses Responses
     *
     * @return \NickVeenhof\IntuoClient\Intuo
     */
    public function getClient(array $responses = [])
    {
        $this->mockHandler = new MockHandler($responses);
        $stack = HandlerStack::create($this->mockHandler);

        return new Intuo(
          $this->apiToken,
          ['handler' => $stack]
        );
    }

}
