<?php

namespace NewsApi;

use NewsApi\Response\Error\Error;
use NewsApi\Response\ResponseInterface;
use NewsApi\Response\SourcesResponse;

/**
 * Class ResponseParser
 * @package NewsApi
 */
class ResponseParser implements ResponseParserInterface
{
    /**
     * @param $response
     * @return ResponseInterface
     */
    public function parseTopHeadlinesResponse($response): ResponseInterface
    {
        return $this->parseResponse($response, 'TopHeadlinesResponse');
    }

    /**
     * @param $response
     * @return ResponseInterface
     */
    public function parseEverythingResponse($response): ResponseInterface
    {
        return $this->parseResponse($response, 'EverythingResponse');
    }

    /**
     * @param $response
     * @return ResponseInterface
     */
    public function parseSourcesResponse($response): ResponseInterface
    {
        $response = json_decode($response);

        if ($response->status !== 'ok') {
            return $this->prepareErrorResponse($response);
        }

        $sourcesResponse = new SourcesResponse();
        $sourcesResponse->status = $response->status;
        $sourcesResponse->sources = [];

        foreach ($response->sources as $responseSource) {
            $source = new Source();
            $source->id = $responseSource->id ?: '';
            $source->name = $responseSource->name ?: '';
            $source->description = $responseSource->description ?: '';
            $source->url = $responseSource->url ?: '';
            $source->category = $responseSource->category ?: '';
            $source->language = $responseSource->language ?: '';
            $source->country = $responseSource->country ?: '';

            $sourcesResponse->sources[] = $source;
        }

        return $sourcesResponse;
    }

    /**
     * @param $response
     * @param string $responseType
     * @return ResponseInterface
     */
    protected function parseResponse($response, $responseType): ResponseInterface
    {
        $response = json_decode($response);

        if ($response->status !== 'ok') {
            return $this->prepareErrorResponse($response);
        }

        $responseInstanceName = 'NewsApi\Response\\' . $responseType;
        $searchResponse = new $responseInstanceName();
        $searchResponse->status = $response->status;
        $searchResponse->totalResults = $response->totalResults;
        $searchResponse->articles = [];

        foreach ($response->articles as $responseArticle) {
            $article = new Article();
            $article->title = $responseArticle->title ?: '';
            $article->url = $responseArticle->url ?: '';
            $article->author = $responseArticle->author ?: '';
            $article->description = $responseArticle->description ?: '';
            $article->urlToImage = $responseArticle->urlToImage ?: '';
            $article->publishedAt = $responseArticle->publishedAt ?: '';

            $source =  new Source();
            $source->id = $responseArticle->source->id ?: '';
            $source->name = $responseArticle->source->name ?: '';
            $article->source = $source;

            $searchResponse->articles[] = $article;
        }

        return $searchResponse;
    }

    /**
     * @param $response
     * @return Error
     */
    protected function prepareErrorResponse($response)
    {
        $error = new Error();
        $error->status = $response->status;
        $error->code = $response->code;
        $error->message = $response->message;

        return $error;
    }
}
