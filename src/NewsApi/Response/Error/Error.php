<?php

namespace NewsApi\Response\Error;

use NewsApi\Response\ResponseInterface;

/**
 * Class Error
 * @package NewsApi
 */
class Error implements ErrorInterface, ResponseInterface
{
    /**
     * @var string
     */
    public $status;
    /**
     * @var string
     */
    public $code;
    /**
     * @var string
     */
    public $message;
}
