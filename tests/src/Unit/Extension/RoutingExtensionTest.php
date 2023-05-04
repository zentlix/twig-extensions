<?php

declare(strict_types=1);

namespace Zentlix\TwigExtensions\Tests\Unit\Extension;

use Nyholm\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Spiral\Router\RouterInterface;
use Zentlix\TwigExtensions\Extension\RoutingExtension;

final class RoutingExtensionTest extends TestCase
{
    public function testGetPath(): void
    {
        $router = $this->createMock(RouterInterface::class);
        $router
            ->expects($this->once())
            ->method('uri')
            ->with('route-name')
            ->willReturn(new Uri('foo'));

        $extension = new RoutingExtension($router);

        $this->assertSame('foo', $extension->getPath('route-name'));
    }

    public function testGetPathWithParameters(): void
    {
        $router = $this->createMock(RouterInterface::class);
        $router
            ->expects($this->once())
            ->method('uri')
            ->with('route-name', ['id' => 1])
            ->willReturn(new Uri('foo/1'));

        $extension = new RoutingExtension($router);

        $this->assertSame('foo/1', $extension->getPath('route-name', ['id' => 1]));
    }
}
