<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

class UnauthorizedResponseException extends UnexpectedResponseException
{
    const STATUS_CODE = 401;
}
