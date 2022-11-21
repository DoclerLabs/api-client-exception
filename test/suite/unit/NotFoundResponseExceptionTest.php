<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\NotFoundResponseException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\NotFoundResponseException
 */
class NotFoundResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getResponse
     */
    public function testException(): void
    {
        $statusCode = 404;
        $response   = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);
        $sut        = new NotFoundResponseException('', $response);

        $this->assertInstanceOf(Throwable::class, $sut);
        $this->assertEquals($statusCode, $sut->getResponse()->getStatusCode());
    }
}
