<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 10.08.2018
 * Time: 01:22
 */

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
