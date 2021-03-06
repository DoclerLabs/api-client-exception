<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\BadRequestResponseException;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\BadRequestResponseException
 */
class BadRequestResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getStatusCode
     */
    public function testException()
    {
        $statusCode = 400;
        $sut        = new BadRequestResponseException();

        $this->assertInstanceOf(Throwable::class, $sut);
        $this->assertEquals($statusCode, $sut->getStatusCode());
    }
}
