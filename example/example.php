<?php

require __DIR__ . '/../vendor/autoload.php';

$requestParser = new \NewsApi\RequestParser();
$responseParser = new \NewsApi\ResponseParser();

$request = new \NewsApi\Request\TopHeadlinesRequest();
$request->apiKey = 'b6484720730b4ddb8957ee605840ccf1';
$request->q = 'Turkish';
$request->category = 'business';

$query = $requestParser->prepareTopHeadlineQueryString($request);

$client = new \NewsApi\Client($requestParser, $responseParser);
$response = $client->topHeadlines($request);

var_dump($response);
