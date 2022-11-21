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
use Psr\Http\Message\ResponseInterface;

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
    public function testCreate(int $statusCode, string $body, string $expectedExceptionClass): void
    {
        $sut = new ResponseExceptionFactory();

        $this->expectException($expectedExceptionClass);

        $response = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);

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
            [456, 'others', UnexpectedResponseException::class],
        ];
    }
}