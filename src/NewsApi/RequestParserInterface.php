<?php

namespace NewsApi;

use NewsApi\Request\SearchRequest;

/**
 * Interface RequestParserInterface
 * @package NewsApi
 */
interface RequestParserInterface
{
    /**
     * @param SearchRequest $request
     * @return string
     */
    public function prepareQueryString(SearchRequest $request): string;
}
