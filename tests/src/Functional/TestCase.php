<?php

declare(strict_types=1);

namespace Zentlix\TwigExtensions\Tests\Functional;

use Spiral\Bootloader\Http\RouterBootloader;
use Spiral\Nyholm\Bootloader\NyholmBootloader;
use Zentlix\TwigExtensions\Bootloader\ExtensionsBootloader;

abstract class TestCase extends \Spiral\Testing\TestCase
{
    public function rootDirectory(): string
    {
        return \dirname(__DIR__, 2);
    }

    public function defineBootloaders(): array
    {
        return [
            NyholmBootloader::class,
            RouterBootloader::class,
            ExtensionsBootloader::class,
        ];
    }
}
