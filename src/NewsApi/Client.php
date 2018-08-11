<?php

namespace NewsApi;

use NewsApi\Request\EverythingRequest;
use NewsApi\Request\TopHeadlinesRequest;
use NewsApi\Response\ResponseInterface;

/**
 * Class Client
 * @package NewsApi
 */
class Client implements ClientInterface
{
    /**
     * @var RequestParserInterface
     */
    private $requestParser;
    /**
     * @var ResponseParserInterface
     */
    private $responseParser;

    protected $apiUrl = 'https://newsapi.org/v2/';

    const TOP_HEADLINES_ENDPOINT = 'top-headlines';
    const EVERYTHING_ENDPOINT = 'everything';
    const SOURCES_ENDPOINT = 'sources';

    /**
     * Client constructor.
     * @param RequestParserInterface $requestParser
     * @param ResponseParserInterface $responseParser
     */
    public function __construct(RequestParserInterface $requestParser, ResponseParserInterface $responseParser)
    {
        $this->requestParser = $requestParser;
        $this->responseParser = $responseParser;
    }

    /**
     * Get top headlines
     * @param TopHeadlinesRequest $request
     * @return ResponseInterface
     */
    public function topHeadlines(TopHeadlinesRequest $request): ResponseInterface
    {
        return $this->responseParser->parseTopHeadlinesResponse(
            $this->sendRequest(
                $this->requestParser->prepareQueryString($request),
                self::TOP_HEADLINES_ENDPOINT
            )
        );
    }

    /**
     * Serch for everything
     * @param EverythingRequest $request
     * @return ResponseInterface
     */
    public function everything(EverythingRequest $request): ResponseInterface
    {
        return $this->responseParser->parseEverythingResponse(
            $this->sendRequest(
                $this->requestParser->prepareQueryString($request),
                self::EVERYTHING_ENDPOINT
            )
        );
    }

    /**
     * @param $query
     * @param string $endpoint
     * @return string
     */
    public function sendRequest($query, $endpoint = self::EVERYTHING_ENDPOINT): string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->apiUrl . $endpoint . '?' . $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}
