<?php declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\UnexpectedResponseBodyException;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @coversDefaultClass \DoclerLabs\ApiClientException\UnexpectedResponseBodyException
 */
class UnexpectedResponseBodyExceptionTest extends TestCase
{
    /**
     * @covers ::__construct
     */
    public function testException()
    {
        $exception = new UnexpectedResponseBodyException();
        $this->assertInstanceOf(Throwable::class, $exception);
    }
}
