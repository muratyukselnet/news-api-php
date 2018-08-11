<?php

namespace NewsApi;

use NewsApi\Request\EverythingRequest;
use NewsApi\Request\SourcesRequest;
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
     * @param EverythingRequest $request
     * @return ResponseInterface
     */
    public function everything(EverythingRequest $request): ResponseInterface;

    /**
     * @param SourcesRequest $request
     * @return ResponseInterface
     */
    public function sources(SourcesRequest $request): ResponseInterface;

    /**
     * @param $query
     * @return string
     */
    public function sendRequest($query): string;
}
