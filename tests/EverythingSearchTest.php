<?php

namespace NewsApi\Tests;

use NewsApi\Client;
use NewsApi\Request\EverythingRequest;
use NewsApi\RequestParser;
use NewsApi\Response\Error\Error;
use NewsApi\Response\Error\ErrorCodes;
use NewsApi\ResponseParser;
use PHPUnit\Framework\TestCase;

/**
 * Class EverythingSearchTest
 * @package NewsApi\Tests
 */
class EverythingSearchTest extends TestCase
{
    private $everythingRequest;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->everythingRequest = new EverythingRequest();
        $this->everythingRequest->q = 'test';
        $this->everythingRequest->apiKey = getenv('NEWS_API_KEY');
    }

    public function testClientEverything()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $response = $client->everything($this->everythingRequest);
        $this->assertObjectHasAttribute('status', $response);
    }

    public function testClientNoApiKey()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->everythingRequest->apiKey = null;
        $response = $client->everything($this->everythingRequest);
        $this->assertInstanceOf('NewsApi\Response\Error\Error', $response);
    }

    public function testClientInvalidApiKey()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->everythingRequest->apiKey = 'test';
        $this->everythingRequest->q = 'test';
        $response = $client->everything($this->everythingRequest);
        /**
         * @var Error $response
         */
        $this->assertEquals(ErrorCodes::API_KEY_INVALID, $response->code);
    }

    public function testClientEverythingNoQuery()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->everythingRequest->q = null;
        $response = $client->everything($this->everythingRequest);
        /**
         * @var Error $response
         */
        $this->assertEquals(ErrorCodes::PARAMETERS_MISSING, $response->code);
    }

    public function testClientValidRequest()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $response = $client->everything($this->everythingRequest);
        $this->assertInstanceOf('NewsApi\Response\EverythingResponse', $response);
    }

    public function testClientMoreRequestParameters()
    {
        $client = new Client(new RequestParser(), new ResponseParser());
        $this->everythingRequest->domains = 'Leconomiste.com,Lifestyle.bg,bbc.com';
        $this->everythingRequest->from = '2018-08-09';
        $this->everythingRequest->to = '2018-08-10';
        $this->everythingRequest->language = 'en';
        $this->everythingRequest->sortBy = 'popularity';
        $response = $client->everything($this->everythingRequest);
        $this->assertInstanceOf('NewsApi\Response\EverythingResponse', $response);
        $this->assertEquals('ok', $response->status);
    }
}
