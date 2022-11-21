<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\UnexpectedResponseException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\UnexpectedResponseException
 */
class UnexpectedResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testException(): void
    {
        $statusCode = 414;
        $errors     = '{"it": "happens"}';
        $response   = $this->createMock(ResponseInterface::class);
        $response->method('getStatusCode')->willReturn($statusCode);
        $sut        = new UnexpectedResponseException($errors, $response);

        $this->assertInstanceOf(Throwable::class, $sut);
        $this->assertEquals($statusCode, $sut->getResponse()->getStatusCode());
        $this->assertEquals(
            \sprintf('%s', $errors),
            $sut->getMessage()
        );
    }
}
