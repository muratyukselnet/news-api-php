<?php

namespace NewsApi;

use NewsApi\Request\TopHeadlinesRequest;

/**
 * Class RequestParser
 * @package NewsApi
 */
class RequestParser implements RequestParserInterface
{
    /**
     * @param TopHeadlinesRequest $request
     * @return string
     */
    public function prepareTopHeadlineQueryString(TopHeadlinesRequest $request): string
    {
        $request = (array) $request;

        foreach ($request as $key => $item) {
            if ($item === null) {
                unset($request[$key]);
            }
        }

        return http_build_query($request);
    }
}
