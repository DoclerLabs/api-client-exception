<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\RequestValidationException;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\RequestValidationException
 */
class RequestValidationExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testException()
    {
        $exception = new RequestValidationException();
        $this->assertInstanceOf(Throwable::class, $exception);
    }
}
