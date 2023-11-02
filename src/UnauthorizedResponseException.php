<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

use Fig\Http\Message\StatusCodeInterface;

class UnauthorizedResponseException extends UnexpectedResponseException
{
    /** @deprecated */
    public const STATUS_CODE = StatusCodeInterface::STATUS_UNAUTHORIZED;
}
