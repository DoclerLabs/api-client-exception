<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

class NotFoundResponseException extends UnexpectedResponseException
{
    public const STATUS_CODE = 404;
}
