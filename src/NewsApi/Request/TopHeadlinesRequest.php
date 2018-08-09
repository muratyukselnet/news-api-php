<?php

namespace NewsApi\Request;

/**
 * Class TopHeadlinesRequest
 * @package NewsApi\Request
 */
class TopHeadlinesRequest extends SearchRequest implements TopHeadlinesRequestInterface
{
    public $country;
    public $category;
    public $sources;
}
