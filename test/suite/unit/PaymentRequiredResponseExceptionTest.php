<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\PaymentRequiredResponseException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\PaymentRequiredResponseException
 */
class PaymentRequiredResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testException(): void
    {
        $statusCode = 402;
        $response   = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);
        $sut        = new PaymentRequiredResponseException('', $response);

        self::assertInstanceOf(Throwable::class, $sut);
        self::assertEquals($statusCode, $sut->getResponse()->getStatusCode());
    }
}
