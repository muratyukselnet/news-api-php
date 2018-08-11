<?php

namespace NewsApi;

use NewsApi\Request\RequestInterface;

/**
 * Class RequestParser
 * @package NewsApi
 */
class RequestParser implements RequestParserInterface
{
    /**
     * @param RequestInterface $request
     * @return string
     */
    public function prepareQueryString(RequestInterface $request): string
    {
        return http_build_query($this->filterRequestParams((array) $request));
    }

    /**
     * @param array $request
     * @return array
     */
    protected function filterRequestParams(array $request): array
    {
        foreach ($request as $key => $item) {
            if ($item === null) {
                unset($request[$key]);
            }
        }

        return $request;
    }
}
