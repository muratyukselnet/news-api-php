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

    /**
     * @param $response
     * @return ResponseInterface
     */
    public function parseEverythingResponse($response): ResponseInterface;

    /**
     * @param $response
     * @return ResponseInterface
     */
    public function parseSourcesResponse($response): ResponseInterface;
}
