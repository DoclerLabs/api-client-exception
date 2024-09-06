<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit\Factory;

use DoclerLabs\ApiClientException\BadRequestResponseException;
use DoclerLabs\ApiClientException\ConflictResponseException;
use DoclerLabs\ApiClientException\Factory\ResponseExceptionFactory;
use DoclerLabs\ApiClientException\ForbiddenResponseException;
use DoclerLabs\ApiClientException\GoneResponseException;
use DoclerLabs\ApiClientException\NotFoundResponseException;
use DoclerLabs\ApiClientException\PaymentRequiredResponseException;
use DoclerLabs\ApiClientException\TooManyRequestsResponseException;
use DoclerLabs\ApiClientException\UnauthorizedResponseException;
use DoclerLabs\ApiClientException\UnexpectedResponseException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * @covers \DoclerLabs\ApiClientException\Factory\ResponseExceptionFactory
 */
class ResponseExceptionsFactoryTest extends TestCase
{
    /**
     * @dataProvider exceptionsDataProvider
     */
    public function testCreate(int $statusCode, string $body, string $expectedExceptionClass): void
    {
        $sut = new ResponseExceptionFactory();

        $this->expectException($expectedExceptionClass);

        /** @var ResponseInterface|MockObject $response */
        $response = $this->createMock(ResponseInterface::class);
        $response
            ->expects(self::atLeastOnce())
            ->method('getStatusCode')
            ->willReturn($statusCode);

        throw $sut->create($body, $response);
    }

    /**
     * @return array<0:int, 1:string, 2:string>
     */
    public function exceptionsDataProvider(): array
    {
        return [
            [400, 'bad request', BadRequestResponseException::class],
            [401, 'unauthorized', UnauthorizedResponseException::class],
            [402, 'payment required', PaymentRequiredResponseException::class],
            [403, 'forbidden', ForbiddenResponseException::class],
            [404, 'not found', NotFoundResponseException::class],
            [409, 'conflict', ConflictResponseException::class],
            [410, 'gone', GoneResponseException::class],
            [429, 'too many requests', TooManyRequestsResponseException::class],
            [456, 'others', UnexpectedResponseException::class],
        ];
    }
}
