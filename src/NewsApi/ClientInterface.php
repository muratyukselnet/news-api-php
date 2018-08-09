<?php

namespace NewsApi;

use NewsApi\Request\TopHeadlinesRequest;
use NewsApi\Response\ResponseInterface;

/**
 * Interface ClientInterface
 * @package NewsApi
 */
interface ClientInterface
{
    /**
     * @param TopHeadlinesRequest $request
     * @return ResponseInterface
     */
    public function topHeadlines(TopHeadlinesRequest $request): ResponseInterface;

    /**
     * @param $query
     * @return string
     */
    public function sendRequest($query): string;
}
