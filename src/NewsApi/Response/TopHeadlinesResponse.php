<?php

namespace NewsApi\Response;

use NewsApi\Article;

/**
 * Class TopHeadlinesResponse
 * @package NewsApi\Response
 */
class TopHeadlinesResponse implements TopHeadlinesResponseInterface
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
