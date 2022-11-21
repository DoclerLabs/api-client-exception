<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

class ForbiddenResponseException extends UnexpectedResponseException
{
    public const STATUS_CODE = 403;
}
