<?php

namespace NewsApi\Tests;

use NewsApi\Client;
use NewsApi\Request\TopHeadlinesRequest;
use NewsApi\RequestParser;
use NewsApi\Response\Error\Error;
use NewsApi\Response\Error\ErrorCodes;
use NewsApi\ResponseParser;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 * @package NewsApi\Tests
 */
class ClientTest extends TestCase
{
    private $topHeadlinesRequest;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->topHeadlinesRequest = new TopHeadlinesRequest();
        $this->topHeadlinesRequest->q = 'test';
        $this->topHeadlinesRequest->apiKey = getenv('NEWS_API_KEY');
    }

    public function testSetApiKey()
    {
        $apiKey = getenv('NEWS_API_KEY');
        $this->assertNotEmpty($apiKey);
    }

    public function testClientTopHeadlines()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $response = $client->topHeadlines($this->topHeadlinesRequest);
        $this->assertObjectHasAttribute('status', $response);
    }

    public function testClientNoApiKey()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->topHeadlinesRequest->apiKey = null;
        $response = $client->topHeadlines($this->topHeadlinesRequest);
        $this->assertInstanceOf('NewsApi\Response\Error\Error', $response);
    }

    public function testClientInvalidApiKey()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->topHeadlinesRequest->apiKey = 'test';
        $this->topHeadlinesRequest->q = 'test';
        $response = $client->topHeadlines($this->topHeadlinesRequest);
        /**
         * @var Error $response
         */
        $this->assertEquals(ErrorCodes::API_KEY_INVALID, $response->code);
    }

    public function testClientTopHeadlinesNoQuery()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->topHeadlinesRequest->q = null;
        $response = $client->topHeadlines($this->topHeadlinesRequest);
        /**
         * @var Error $response
         */
        $this->assertEquals(ErrorCodes::PARAMETERS_MISSING, $response->code);
    }

    public function testClientValidRequest()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $response = $client->topHeadlines($this->topHeadlinesRequest);
        $this->assertInstanceOf('NewsApi\Response\TopHeadlinesResponse', $response);
    }
}
