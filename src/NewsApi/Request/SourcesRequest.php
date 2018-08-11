<?php

namespace NewsApi\Request;

/**
 * Class SourcesRequest
 * @package NewsApi\Request
 */
class SourcesRequest implements SourcesRequestInterface
{
    public $category;
    public $language;
    public $country;
    public $apiKey;
}
