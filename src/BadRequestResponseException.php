<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

use Fig\Http\Message\StatusCodeInterface;

class BadRequestResponseException extends UnexpectedResponseException
{
    /** @deprecated */
    public const STATUS_CODE = StatusCodeInterface::STATUS_BAD_REQUEST;
}
