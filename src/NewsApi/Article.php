<?php

namespace NewsApi;

/**
 * Class Article
 * @package NewsApi
 */
class Article
{
    /**
     * @var Source
     */
    public $source;
    /**
     * @var string
     */
    public $author;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $url;
    /**
     * @var string
     */
    public $urlToImage;
    /**
     * @var string
     */
    public $publishedAt;
}
