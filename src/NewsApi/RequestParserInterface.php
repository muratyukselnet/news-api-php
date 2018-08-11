<?php

namespace NewsApi;

use NewsApi\Request\RequestInterface;

/**
 * Interface RequestParserInterface
 * @package NewsApi
 */
interface RequestParserInterface
{
    /**
     * @param RequestInterface $request
     * @return string
     */
    public function prepareQueryString(RequestInterface $request): string;
}
