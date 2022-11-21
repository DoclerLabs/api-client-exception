<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\UnauthorizedResponseException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\UnauthorizedResponseException
 */
class UnauthorizedResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testException(): void
    {
        $statusCode = 401;
        $response   = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);
        $sut        = new UnauthorizedResponseException('', $response);

        $this->assertInstanceOf(Throwable::class, $sut);
        $this->assertEquals($statusCode, $sut->getResponse()->getStatusCode());
    }
}
