<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\UnexpectedResponseException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @covers \DoclerLabs\ApiClientException\UnexpectedResponseException
 */
class UnexpectedResponseExceptionTest extends TestCase
{
    public function testException(): void
    {
        $statusCode = 414;
        $errors     = '{"it": "happens"}';

        /** @var ResponseInterface|MockObject $response */
        $response = $this->createMock(ResponseInterface::class);
        $response
            ->expects(self::once())
            ->method('getStatusCode')
            ->willReturn($statusCode);

        $sut = new UnexpectedResponseException($errors, $response);

        self::assertInstanceOf(Throwable::class, $sut);
        self::assertEquals($statusCode, $sut->getResponse()->getStatusCode());
        self::assertEquals(sprintf('%s', $errors), $sut->getMessage());
    }
}
