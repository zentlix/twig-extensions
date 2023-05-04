<?php

declare(strict_types=1);

namespace Zentlix\TwigExtensions\Bootloader;

use Spiral\Boot\Bootloader\Bootloader;
use Spiral\Twig\Bootloader\TwigBootloader;
use Zentlix\TwigExtensions\Extension\RoutingExtension;
use Zentlix\TwigExtensions\Extension\TranslationExtension;
use Zentlix\TwigExtensions\Extension\TypeExtension;

final class ExtensionsBootloader extends Bootloader
{
    protected const DEPENDENCIES = [
        TwigBootloader::class,
    ];

    public function boot(
        TwigBootloader $twig,
        TranslationExtension $translationExtension,
        RoutingExtension $routingExtension
    ): void {
        $twig->addExtension($translationExtension);
        $twig->addExtension($routingExtension);
        $twig->addExtension(new TypeExtension());
    }
}
