<?php

namespace NewsApi\Request;

/**
 * Class EverythingRequest
 * @package NewsApi\Request
 */
class EverythingRequest extends SearchRequest implements EverythingRequestInterface
{
    public $sources;
    public $domains;
    public $from;
    public $to;
    public $language;
    public $sortBy;
}
