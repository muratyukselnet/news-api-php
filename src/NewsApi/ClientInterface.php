<?php

namespace NewsApi;

use NewsApi\Request\TopHeadlinesRequestInterface;
use NewsApi\Response\TopHeadlinesResponse;

/**
 * Interface ClientInterface
 * @package NewsApi
 */
interface ClientInterface
{
    /**
     * @param TopHeadlinesRequestInterface $request
     * @return TopHeadlinesResponse
     */
    public function topHeadlines(TopHeadlinesRequestInterface $request): TopHeadlinesResponse;
}
