<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\ForbiddenResponseException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\ForbiddenResponseException
 */
class ForbiddenResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getStatusCode
     */
    public function testException(): void
    {
        $statusCode = 403;
        $response   = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);
        $sut        = new ForbiddenResponseException('', $response);

        $this->assertInstanceOf(Throwable::class, $sut);
        $this->assertEquals($statusCode, $sut->getResponse()->getStatusCode());
    }
}
