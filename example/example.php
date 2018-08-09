<?php

require __DIR__ . '/../vendor/autoload.php';

$request = new \NewsApi\Request\TopHeadlinesRequest();
$request->apiKey = getenv('NEWS_API_KEY');
$request->q = 'Turkish';
$request->category = 'business';

$client = new \NewsApi\Client(new \NewsApi\RequestParser(), new \NewsApi\ResponseParser());
$response = $client->topHeadlines($request);

var_dump($response);
