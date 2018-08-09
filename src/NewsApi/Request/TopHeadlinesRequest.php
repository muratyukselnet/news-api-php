<?php

namespace NewsApi\Request;

/**
 * Class TopHeadlinesRequest
 * @package NewsApi\Request
 */
class TopHeadlinesRequest implements TopHeadlinesRequestInterface
{
    public $country;
    public $category;
    public $sources;
    public $q;
    public $pageSize;
    public $page;
    public $apiKey;
}
