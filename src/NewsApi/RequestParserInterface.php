<?php

namespace NewsApi;

use NewsApi\Request\TopHeadlinesRequest;

/**
 * Interface RequestParserInterface
 * @package NewsApi
 */
interface RequestParserInterface
{
    public function prepareTopHeadlineQueryString(TopHeadlinesRequest $request): string;
}
