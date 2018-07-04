<?php

namespace NewsApi\Tests {

    use Dotenv\Dotenv;

    include __DIR__ . '/../vendor/autoload.php';

    $dotenv = new Dotenv(__DIR__.'/..');
    $dotenv->load();
}
