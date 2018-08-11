<?php

require __DIR__ . '/../vendor/autoload.php';

$client = new \NewsApi\Client(new \NewsApi\RequestParser(), new \NewsApi\ResponseParser());
var_dump(topHeadlines($client));


function topHeadlines(\NewsApi\Client $client)
{
    $request = new \NewsApi\Request\TopHeadlinesRequest();
    $request->apiKey = getenv('NEWS_API_KEY');
    $request->q = 'Turkey';
    $request->category = 'business';

    return $client->topHeadlines($request);
}

function everything(\NewsApi\Client $client)
{
    $request = new \NewsApi\Request\EverythingRequest();
    $request->apiKey = getenv('NEWS_API_KEY');
    $request->q = 'Turkey';
    $request->language = 'en';
    $request->sortBy = 'relevancy';

    return $client->everything($request);
}

function sources(\NewsApi\Client $client)
{
    $request = new \NewsApi\Request\SourcesRequest();
    $request->apiKey = getenv('NEWS_API_KEY');
    $request->language = 'en';
    $request->category = 'entertainment';

    return $client->sources($request);
}
