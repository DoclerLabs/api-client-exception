<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;

class RequestValidationException extends Exception implements ClientExceptionInterface
{
}
