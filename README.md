# PHP Client for Google News API

PHP wrapper for Google News API. For more information: https://newsapi.org/

## Install

composer require murat-yuksel/news-api-php

## Example

Basic
```
 $client = new \NewsApi\Client();
 $request = new \NewsApi\Request\TopHeadlinesRequest();
 $request->apiKey = getenv('NEWS_API_KEY');
 $request->q = 'turkey';
 $request->category = 'business';
 
 $result = $client->topHeadlines($request);
```

Another
```
function sources(\NewsApi\Client $client)
{
    $request = new \NewsApi\Request\SourcesRequest();
    $request->apiKey = getenv('NEWS_API_KEY');
    $request->language = 'en';
    $request->category = 'entertainment';

    return $client->sources($request);
}
```

Laravel
```
Route::get('/', function (\NewsApi\Client $client) {
    $request = new \NewsApi\Request\EverythingRequest();
    $request->apiKey = env('NEWS_API_KEY');
    $request->q = 'turkey';
    $sources = $client->everything($request);
    var_dump($sources);
});
```

## Endpoints

- /v2/top-headlines
- /v2/everything
- /v2/sources 

All request parameters are available via TopHeadlinesRequest, EverythingRequest and SourcesRequest 

## Tests

Needs api key provided with env 

phpunit tests/ --bootstrap tests/bootstrap.php

## Want to contribute?

Don't be shy, open for any suggestion, pull request, bug report... Open an issue please 