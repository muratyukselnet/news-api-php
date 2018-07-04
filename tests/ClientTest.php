<?php

namespace NewsApi\Tests;

use NewsApi\Client;
use NewsApi\Request\TopHeadlinesRequest;
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
    }

    public function testSetApiKey()
    {
        $apiKey = getenv('NEWS_API_KEY');
        $this->assertNotEmpty($apiKey);
    }

    public function testClientTopHeadlines()
    {
        $client = new Client();
        $client->topHeadlines($this->topHeadlinesRequest);
    }
}
