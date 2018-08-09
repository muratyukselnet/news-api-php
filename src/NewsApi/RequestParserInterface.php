<?php

namespace NewsApi;

use NewsApi\Request\TopHeadlinesRequest;

/**
 * Interface RequestParserInterface
 * @package NewsApi
 */
interface RequestParserInterface
{
    /**
     * @param TopHeadlinesRequest $request
     * @return string
     */
    public function prepareTopHeadlineQueryString(TopHeadlinesRequest $request): string;
}
