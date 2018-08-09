<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 10.08.2018
 * Time: 01:11
 */

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
