<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientException;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class UnexpectedResponseException extends Exception implements ClientExceptionInterface
{
    /** @var ResponseInterface */
    protected $response;

    public function __construct(
        string $message,
        ResponseInterface $response,
        Throwable $previous = null
    ) {
        parent::__construct(
            $message,
            0,
            $previous
        );
        $this->response = $response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
