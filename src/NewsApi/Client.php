<?php

namespace NewsApi;

use NewsApi\Request\TopHeadlinesRequestInterface;
use NewsApi\Response\TopHeadlinesResponse;

/**
 * Class Client
 * @package NewsApi
 */
class Client implements ClientInterface
{
    /**
     * Get top headlines
     * @param TopHeadlinesRequestInterface $request
     * @return TopHeadlinesResponse
     */
    public function topHeadlines(TopHeadlinesRequestInterface $request): TopHeadlinesResponse
    {
        return new TopHeadlinesResponse();
    }
}
