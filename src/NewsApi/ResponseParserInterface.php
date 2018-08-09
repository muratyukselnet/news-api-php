<?php

namespace NewsApi;

use NewsApi\Response\ResponseInterface;

/**
 * Interface ResponseParserInterface
 * @package NewsApi
 */
interface ResponseParserInterface
{
    /**
     * @param $response
     * @return ResponseInterface
     */
    public function parseTopHeadlinesResponse($response): ResponseInterface;
}
