<?php

namespace NewsApi\Response\Error;

/**
 * Class ErrorCodes
 * @package NewsApi
 */
class ErrorCodes
{
    const API_KEY_DISABLED = 'apiKeyDisabled';
    const API_KEY_EXHAUSTED = 'apiKeyExhausted';
    const API_KEY_INVALID = 'apiKeyInvalid';
    const API_KEY_MISSING = 'apiKeyMissing';
    const PARAMETER_INVALID = 'parameterInvalid';
    const PARAMETERS_MISSING = 'parametersMissing';
    const RATE_LIMITED = 'rateLimited';
    const SOURCES_TOO_MANY = 'sourcesTooMany';
    const SOURCE_DOES_NOT_EXIST = 'sourceDoesNotExist';
    const UNEXPECTED_ERROR = 'unexpectedError';
}
