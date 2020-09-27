<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

class PaymentRequiredResponseException extends UnexpectedResponseException
{
    const STATUS_CODE = 402;
}
