<?php

namespace NewsApi\Tests;

use NewsApi\Client;
use NewsApi\Request\SourcesRequest;
use NewsApi\RequestParser;
use NewsApi\Response\Error\Error;
use NewsApi\Response\Error\ErrorCodes;
use NewsApi\ResponseParser;
use PHPUnit\Framework\TestCase;

/**
 * Class SourcesTest
 * @package NewsApi\Tests
 */
class SourcesTest extends TestCase
{
    private $sourcesRequest;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->sourcesRequest = new SourcesRequest();
        $this->sourcesRequest->apiKey = getenv('NEWS_API_KEY');
    }

    public function testSources()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $response = $client->sources($this->sourcesRequest);
        $this->assertObjectHasAttribute('status', $response);
    }

    public function testSourcesNoApiKey()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->sourcesRequest->apiKey = null;
        $response = $client->sources($this->sourcesRequest);
        $this->assertInstanceOf('NewsApi\Response\Error\Error', $response);
    }

    public function testSourcesInvalidApiKey()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->sourcesRequest->apiKey = 'test';
        $response = $client->sources($this->sourcesRequest);
        /**
         * @var Error $response
         */
        $this->assertEquals(ErrorCodes::API_KEY_INVALID, $response->code);
    }

    public function testSourcesValidRequest()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $response = $client->sources($this->sourcesRequest);
        $this->assertInstanceOf('NewsApi\Response\SourcesResponse', $response);
    }
}
