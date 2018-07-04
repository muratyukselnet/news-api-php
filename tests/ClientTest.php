<?php

namespace NewsApi\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 * @package NewsApi\Tests
 */
class ClientTest extends TestCase
{
    public function testSetApiKey()
    {
        $apiKey = getenv('NEWS_API_KEY');
        $this->assertNotEmpty($apiKey);
    }
}