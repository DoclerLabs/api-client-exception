<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\UnexpectedResponseException;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\UnexpectedResponseException
 */
class UnexpectedResponseExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getStatusCode
     * @covers ::getMessage
     */
    public function testException()
    {
        $statusCode = 414;
        $errors     = '{"it": "happens"}';
        $sut        = new UnexpectedResponseException($errors, new Response($statusCode));

        $this->assertInstanceOf(Throwable::class, $sut);
        $this->assertEquals($statusCode, $sut->getResponse()->getStatusCode());
        $this->assertEquals(
            \sprintf('%s', $errors),
            $sut->getMessage()
        );
    }
}
