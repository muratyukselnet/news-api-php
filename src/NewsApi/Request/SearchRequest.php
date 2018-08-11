<?php

namespace NewsApi\Request;

/**
 * Class SearchRequest
 * @package NewsApi\Request
 */
class SearchRequest implements RequestInterface
{
    public $q;
    public $pageSize;
    public $page;
    public $apiKey;
}
