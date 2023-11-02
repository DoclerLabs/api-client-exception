<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\RequestValidationException;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @covers \DoclerLabs\ApiClientException\RequestValidationException
 */
class RequestValidationExceptionTest extends TestCase
{
    public function testException(): void
    {
        self::assertInstanceOf(Throwable::class, new RequestValidationException());
    }
}
