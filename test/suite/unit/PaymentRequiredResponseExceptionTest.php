<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\PaymentRequiredResponseException;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\PaymentRequiredResponseException
 */
class PaymentRequiredResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getStatusCode
     */
    public function testException()
    {
        $statusCode = 402;
        $sut        = new PaymentRequiredResponseException();

        self::assertInstanceOf(Throwable::class, $sut);
        self::assertEquals($statusCode, $sut->getStatusCode());
    }
}
