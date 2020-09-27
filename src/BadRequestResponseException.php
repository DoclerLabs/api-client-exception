<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

class BadRequestResponseException extends UnexpectedResponseException
{
    const STATUS_CODE = 400;
}
