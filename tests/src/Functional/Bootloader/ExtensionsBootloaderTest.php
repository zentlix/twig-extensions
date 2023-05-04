<?php

declare(strict_types=1);

namespace Zentlix\TwigExtensions\Tests\Functional\Bootloader;

use Spiral\Twig\Config\TwigConfig;
use Zentlix\TwigExtensions\Extension\RoutingExtension;
use Zentlix\TwigExtensions\Extension\TranslationExtension;
use Zentlix\TwigExtensions\Extension\TypeExtension;
use Zentlix\TwigExtensions\Tests\Functional\TestCase;

final class ExtensionsBootloaderTest extends TestCase
{
    public function testExtensionsShouldBeRegistered(): void
    {
        $config = $this->getConfig(TwigConfig::CONFIG);

        $this->assertContainsEquals($this->getContainer()->get(RoutingExtension::class), $config['extensions']);
        $this->assertContainsEquals($this->getContainer()->get(TranslationExtension::class), $config['extensions']);
        $this->assertContainsEquals($this->getContainer()->get(TypeExtension::class), $config['extensions']);
    }
}
