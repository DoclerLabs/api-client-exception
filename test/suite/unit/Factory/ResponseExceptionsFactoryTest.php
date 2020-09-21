<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit\Factory;

use DoclerLabs\ApiClientException\BadRequestResponseException;
use DoclerLabs\ApiClientException\Factory\ResponseExceptionFactory;
use DoclerLabs\ApiClientException\ForbiddenResponseException;
use DoclerLabs\ApiClientException\NotFoundResponseException;
use DoclerLabs\ApiClientException\PaymentRequiredResponseException;
use DoclerLabs\ApiClientException\UnauthorizedResponseException;
use DoclerLabs\ApiClientException\UnexpectedResponseException;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\Factory\ResponseExceptionFactory
 */
class ResponseExceptionsFactoryTest extends TestCase
{
    /**
     * @dataProvider exceptionsDataProvider
     * @covers ::__construct
     * @covers ::create
     */
    public function testCreate(int $statusCode, string $body, string $expectedExceptionClass)
    {
        $sut = new ResponseExceptionFactory();

        $this->expectException($expectedExceptionClass);

        throw $sut->create($statusCode, $body);
    }

    public function exceptionsDataProvider(): array
    {
        return [
            [400, 'bad request', BadRequestResponseException::class],
            [401, 'unauthorized', UnauthorizedResponseException::class],
            [402, 'payment required', PaymentRequiredResponseException::class],
            [403, 'forbidden', ForbiddenResponseException::class],
            [404, 'not found', NotFoundResponseException::class],
            [456, 'others', UnexpectedResponseException::class],
        ];
    }
}