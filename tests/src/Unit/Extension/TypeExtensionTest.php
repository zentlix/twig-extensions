<?php

declare(strict_types=1);

namespace Zentlix\TwigExtensions\Tests\Unit\Extension;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Zentlix\TwigExtensions\Extension\TypeExtension;

final class TypeExtensionTest extends TestCase
{
    #[DataProvider('ofTypeDataProvider')]
    public function testOfType(bool $expected, mixed $var, string $test, string $class = null): void
    {
        $extension = new TypeExtension();

        $this->assertSame($expected, $extension->ofType($var, $test, $class));
    }

    public function testOfTypeException(): void
    {
        $extension = new TypeExtension();

        $this->expectException(\InvalidArgumentException::class);
        $extension->ofType('bar', 'foo');
    }

    public static function ofTypeDataProvider(): \Traversable
    {
        yield [true, [], 'array'];
        yield [false, 'foo', 'array'];

        yield [true, false, 'bool'];
        yield [false, 'foo', 'bool'];

        yield [true, new \stdClass(), 'object'];
        yield [false, 'foo', 'object'];

        yield [true, new \stdClass(), 'class', \stdClass::class];
        yield [false, 'foo', 'class', \stdClass::class];

        yield [true, 1.2, 'float'];
        yield [false, 'foo', 'float'];

        yield [true, 1, 'int'];
        yield [false, 'foo', 'int'];

        yield [true, '1', 'numeric'];
        yield [true, '1.2', 'numeric'];
        yield [false, 'foo', 'numeric'];

        yield [true, 'foo', 'scalar'];
        yield [false, null, 'scalar'];

        yield [true, 'foo', 'string'];
        yield [false, null, 'string'];
    }
}
