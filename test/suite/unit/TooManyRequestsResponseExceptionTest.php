<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\TooManyRequestsResponseException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @covers \DoclerLabs\ApiClientException\TooManyRequestsResponseException
 */
class TooManyRequestsResponseExceptionTest extends TestCase
{
    public function testException(): void
    {
        $statusCode = 429;

        /** @var ResponseInterface|MockObject $response */
        $response = $this->createMock(ResponseInterface::class);
        $response
            ->expects(self::once())
            ->method('getStatusCode')
            ->willReturn($statusCode);

        $sut = new TooManyRequestsResponseException('', $response);

        self::assertInstanceOf(Throwable::class, $sut);
        self::assertEquals($statusCode, $sut->getResponse()->getStatusCode());
    }
}
