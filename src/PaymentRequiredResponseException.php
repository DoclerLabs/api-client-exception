<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

use Fig\Http\Message\StatusCodeInterface;

class PaymentRequiredResponseException extends UnexpectedResponseException
{
    /** @deprecated */
    public const STATUS_CODE = StatusCodeInterface::STATUS_PAYMENT_REQUIRED;
}
