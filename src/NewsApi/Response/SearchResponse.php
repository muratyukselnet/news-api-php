<?php

namespace NewsApi\Response;

use NewsApi\Article;

/**
 * Class SearchResponse
 * @package NewsApi\Response
 */
class SearchResponse implements ResponseInterface
{
    /**
     * @var string
     */
    public $status;
    /**
     * @var integer
     */
    public $totalResults;
    /**
     * @var Article[]
     */
    public $articles;
}
