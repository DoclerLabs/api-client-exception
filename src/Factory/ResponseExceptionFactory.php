<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientException\Factory;

use DoclerLabs\ApiClientException\BadRequestResponseException;
use DoclerLabs\ApiClientException\ConflictResponseException;
use DoclerLabs\ApiClientException\ForbiddenResponseException;
use DoclerLabs\ApiClientException\GoneResponseException;
use DoclerLabs\ApiClientException\NotFoundResponseException;
use DoclerLabs\ApiClientException\PaymentRequiredResponseException;
use DoclerLabs\ApiClientException\TooManyRequestsResponseException;
use DoclerLabs\ApiClientException\UnauthorizedResponseException;
use DoclerLabs\ApiClientException\UnexpectedResponseException;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;
use ReflectionClass;

class ResponseExceptionFactory
{
    private const RESPONSE_EXCEPTIONS = [
        StatusCodeInterface::STATUS_BAD_REQUEST       => BadRequestResponseException::class,
        StatusCodeInterface::STATUS_UNAUTHORIZED      => UnauthorizedResponseException::class,
        StatusCodeInterface::STATUS_PAYMENT_REQUIRED  => PaymentRequiredResponseException::class,
        StatusCodeInterface::STATUS_FORBIDDEN         => ForbiddenResponseException::class,
        StatusCodeInterface::STATUS_NOT_FOUND         => NotFoundResponseException::class,
        StatusCodeInterface::STATUS_CONFLICT          => ConflictResponseException::class,
        StatusCodeInterface::STATUS_GONE              => GoneResponseException::class,
        StatusCodeInterface::STATUS_TOO_MANY_REQUESTS => TooManyRequestsResponseException::class,
    ];

    public function create(string $message, ResponseInterface $response): UnexpectedResponseException
    {
        return (isset(self::RESPONSE_EXCEPTIONS[$response->getStatusCode()]))
            ? (new ReflectionClass(self::RESPONSE_EXCEPTIONS[$response->getStatusCode()]))->newInstance($message, $response)
            : new UnexpectedResponseException($message, $response);
    }
}
