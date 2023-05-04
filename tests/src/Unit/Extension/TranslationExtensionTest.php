<?php

declare(strict_types=1);

namespace Zentlix\TwigExtensions\Tests\Unit\Extension;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Psr\Container\ContainerInterface;
use Spiral\Translator\TranslatorInterface;
use Zentlix\TwigExtensions\Extension\TranslationExtension;

final class TranslationExtensionTest extends TestCase
{
    #[DataProvider('messagesDataProvider')]
    public function testTrans(string|\Stringable $message): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container
            ->expects($this->once())
            ->method('has')
            ->with(TranslatorInterface::class)
            ->willReturn(true);

        $translator = $this->createMock(TranslatorInterface::class);
        $translator
            ->expects($this->once())
            ->method('trans')
            ->with($message)
            ->willReturn('translated');

        $container
            ->expects($this->once())
            ->method('get')
            ->with(TranslatorInterface::class)
            ->willReturn($translator);

        $extension = new TranslationExtension($container);

        $this->assertSame('translated', $extension->trans($message));
    }

    #[DataProvider('emptyMessagesDataProvider')]
    public function testEmptyMessage(string|\Stringable|null $message): void
    {
        $container = $this->createMock(ContainerInterface::class);
        $container->expects($this->never())->method('has');

        $translator = $this->createMock(TranslatorInterface::class);
        $translator->expects($this->never())->method('trans');

        $container->expects($this->never())->method('get');

        $extension = new TranslationExtension($container);

        $this->assertSame('', $extension->trans($message));
    }

    public static function messagesDataProvider(): \Traversable
    {
        yield ['foo'];
        yield [new class() implements \Stringable {
            public function __toString(): string
            {
                return 'foo';
            }
        }];
    }

    public static function emptyMessagesDataProvider(): \Traversable
    {
        yield [''];
        yield [null];
        yield [new class() implements \Stringable {
            public function __toString(): string
            {
                return '';
            }
        }];
    }
}
