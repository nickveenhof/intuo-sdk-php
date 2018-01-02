<?php

namespace NickVeenhof\IntuoClient\Test;

use NickVeenhof\IntuoClient\Entity\Praise;
use GuzzleHttp\Psr7\Response;

class PraiseTest extends TestBase
{
    public function testHandlerStack() {
        $response = new Response(200, [], json_encode([]));

        $responses = [
          $response,
        ];
        $client = $this->getClient($responses);

        // Get Rule Manager
        $manager = $client->getPraiseManager();

        // Check if the client has already have expected handlers.
        // To check, to insert a dummy function after the expected handler, and
        // hope it finds the expected handler without throwing an Exception.
        $handler = $manager->getClient()->getConfig('handler');
        $testFunction = function () {};
        $handler->after('intuo_api_token', $testFunction);
    }

    public function testPraisesQuery()
    {
        $data = [
          'praises' => [
            [
              'id' => 10,
              'sender_id' => 11,
              'receiver_id' => 12,
              'team_id' => null,
              'performance_driver_ids' => [
                'performance-driver-id-1',
              ],
              'text_content' => 'text-description',
              'bucket_id' => 20,
              'likes_count' => 30,
              'comment_count' => 100,
            ],
          ]
        ];

        $response = new Response(200, [], json_encode($data));
        $responses = [
          $response,
        ];

        $client = $this->getClient($responses);

        // Get Praise Manager
        $manager = $client->getPraiseManager();
        $option = [
            'page' => 0,
            'per_page' => 25,
        ];
        $responses = $manager->query($option);
        $request = $this->mockHandler->getLastRequest();

        // Check for request configuration
        $this->assertEquals($request->getMethod(), 'GET');
        $this->assertEquals((string) $request->getUri(), '/public/praises?page=0&per_page=25');

        $requestHeaders = $request->getHeaders();
        $this->assertEquals($requestHeaders['Content-Type'][0], 'application/json');
      $requestHeaders = $request->getHeaders();
      $this->assertEquals($requestHeaders['Accept'][0], 'application/json; version=1');

        // Check for response basic fields
        foreach ($responses as $response) {
          // Check if the identifier is equal.
          $this->assertEquals($response->getId(), 10);

          // Check if the sender identifier is equal.
          $this->assertEquals($response->getSenderId(), 11);

          // Check if the receiver identifier is equal.
          $this->assertEquals($response->getReceiverId(), 12);

          // Check if the tean identifier is equal.
          $this->assertEquals($response->getTeamId(), null);

          // Check if the rule_ids is equal.
          $this->assertEquals($response->getPerformanceDriverIds(), ['performance-driver-id-1']);

          // Check if the tean identifier is equal.
          $this->assertEquals($response->getBucketId(), 20);

          // Check if the tean identifier is equal.
          $this->assertEquals($response->getTextContent(), 'text-description');

          // Check if the tean identifier is equal.
          $this->assertEquals($response->getLikesCount(), 30);

          // Check if the tean identifier is equal.
          $this->assertEquals($response->getCommentCount(), 100);
        }
    }

    /**
     * @expectedException     \GuzzleHttp\Exception\RequestException
     * @expectedExceptionCode 400
     */
    public function testPraiseQueryFailed()
    {
        $response = new Response(400, []);
        $responses = [
          $response,
        ];

        $client = $this->getClient($responses);

        // Get Praise Manager
        $manager = $client->getPraiseManager();
        $manager->query();
    }


    public function testPraiseGet()
    {
        // Setup
        $data = [
          'praise' => [
            'id' => 10,
            'sender_id' => 11,
            'receiver_id' => 12,
            'team_id' => null,
            'performance_driver_ids' => [
              'performance-driver-id-1',
            ],
            'text_content' => 'text-description',
            'bucket_id' => 20,
            'likes_count' => 30,
            'comment_count' => 100,
          ]
        ];

        $response = new Response(200, [], json_encode($data));
        $responses = [
          $response,
        ];

        $client = $this->getClient($responses);

        // Get Praise Manager
        $manager = $client->getPraiseManager();
        $response = $manager->get('10');
        $request = $this->mockHandler->getLastRequest();

        // Check for request configuration
        $this->assertEquals($request->getMethod(), 'GET');
        $this->assertEquals((string) $request->getUri(), '/public/praises/10');

        $requestHeaders = $request->getHeaders();
        $this->assertEquals($requestHeaders['Content-Type'][0], 'application/json');
      $requestHeaders = $request->getHeaders();
      $this->assertEquals($requestHeaders['Accept'][0], 'application/json; version=1');


      // Check for response basic fields
        // Check if the identifier is equal.
        $this->assertEquals($response->getId(), 10);

        // Check if the sender identifier is equal.
        $this->assertEquals($response->getSenderId(), 11);

        // Check if the receiver identifier is equal.
        $this->assertEquals($response->getReceiverId(), 12);

        // Check if the tean identifier is equal.
        $this->assertEquals($response->getTeamId(), null);

        // Check if the rule_ids is equal.
        $this->assertEquals($response->getPerformanceDriverIds(), ['performance-driver-id-1']);

        // Check if the tean identifier is equal.
        $this->assertEquals($response->getBucketId(), 20);

        // Check if the tean identifier is equal.
        $this->assertEquals($response->getTextContent(), 'text-description');

        // Check if the tean identifier is equal.
        $this->assertEquals($response->getLikesCount(), 30);

        // Check if the tean identifier is equal.
        $this->assertEquals($response->getCommentCount(), 100);
    }

    /**
     * @expectedException     \GuzzleHttp\Exception\RequestException
     * @expectedExceptionCode 400
     */
    public function testPraiseGetFailed()
    {
        $response = new Response(400, []);
        $responses = [
          $response,
        ];

        $client = $this->getClient($responses);

        // Get Praise Manager
        $manager = $client->getPraiseManager();
        $manager->get('non-existing-praise');
    }
}
