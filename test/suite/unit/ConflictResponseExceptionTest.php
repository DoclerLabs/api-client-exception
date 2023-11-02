<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\ConflictResponseException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @covers \DoclerLabs\ApiClientException\ConflictResponseException
 */
class ConflictResponseExceptionTest extends TestCase
{
    public function testException(): void
    {
        $statusCode = 409;

        /** @var ResponseInterface|MockObject $response */
        $response = $this->createMock(ResponseInterface::class);
        $response
            ->expects(self::once())
            ->method('getStatusCode')
            ->willReturn($statusCode);

        $sut = new ConflictResponseException('', $response);

        self::assertInstanceOf(Throwable::class, $sut);
        self::assertEquals($statusCode, $sut->getResponse()->getStatusCode());
    }
}
