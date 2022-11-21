<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

class PaymentRequiredResponseException extends UnexpectedResponseException
{
    public const STATUS_CODE = 402;
}
