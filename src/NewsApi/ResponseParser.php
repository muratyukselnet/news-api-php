<?php

namespace NewsApi;

use NewsApi\Response\Error\Error;
use NewsApi\Response\ResponseInterface;
use NewsApi\Response\TopHeadlinesResponse;

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
        $response = json_decode($response);

        if ($response->status !== 'ok') {
            $error = new Error();
            $error->status = $response->status;
            $error->code = $response->code;
            $error->message = $response->message;

            return $error;
        }

        $topHeadlinesResponse = new TopHeadlinesResponse();
        $topHeadlinesResponse->status = $response->status;
        $topHeadlinesResponse->totalResults = $response->totalResults;
        $topHeadlinesResponse->articles = [];

        foreach ($response->articles as $responseArticle) {
            $article = new Article();
            $article->title = $responseArticle->title ?: '';
            $article->url = $responseArticle->url;
            $article->author = $responseArticle->author ?: '';
            $article->description = $responseArticle->description ?: '';
            $article->urlToImage = $responseArticle->urlToImage ?: '';
            $article->publishedAt = $responseArticle->publishedAt ?: '';

            $source =  new Source();
            $source->id = $responseArticle->source->id ?: '';
            $source->name = $responseArticle->source->name ?: '';
            $article->source = $source;

            $topHeadlinesResponse->articles[] = $article;
        }

        return $topHeadlinesResponse;
    }
}
