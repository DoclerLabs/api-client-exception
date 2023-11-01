<?php

declare(strict_types=1);

namespace DoclerLabs\ApiClientBase\Test\Unit;

use DoclerLabs\ApiClientException\UnexpectedResponseBodyException;
use PHPUnit\Framework\TestCase;
use Throwable;

/**
 * @covers \DoclerLabs\ApiClientException\UnexpectedResponseBodyException
 */
class UnexpectedResponseBodyExceptionTest extends TestCase
{
    public function testException(): void
    {
        self::assertInstanceOf(Throwable::class, new UnexpectedResponseBodyException());
    }
}
