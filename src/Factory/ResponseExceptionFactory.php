<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException\Factory;

use DoclerLabs\ApiClientException\BadRequestResponseException;
use DoclerLabs\ApiClientException\ForbiddenResponseException;
use DoclerLabs\ApiClientException\NotFoundResponseException;
use DoclerLabs\ApiClientException\PaymentRequiredResponseException;
use DoclerLabs\ApiClientException\UnauthorizedResponseException;
use DoclerLabs\ApiClientException\UnexpectedResponseException;

class ResponseExceptionFactory
{
    /** @var string[] */
    private $responseExceptions;

    public function __construct()
    {
        $this->responseExceptions = [
            BadRequestResponseException::STATUS_CODE      => BadRequestResponseException::class,
            UnauthorizedResponseException::STATUS_CODE    => UnauthorizedResponseException::class,
            PaymentRequiredResponseException::STATUS_CODE => PaymentRequiredResponseException::class,
            ForbiddenResponseException::STATUS_CODE       => ForbiddenResponseException::class,
            NotFoundResponseException::STATUS_CODE        => NotFoundResponseException::class,
        ];
    }

    public function create(int $statusCode, string $responseBody): UnexpectedResponseException
    {
        if (isset($this->responseExceptions[$statusCode])) {
            return new $this->responseExceptions[$statusCode]($responseBody);
        }

        return new UnexpectedResponseException($statusCode, $responseBody);
    }
}