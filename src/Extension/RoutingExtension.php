<?php

declare(strict_types=1);

namespace Zentlix\TwigExtensions\Extension;

use Spiral\Router\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class RoutingExtension extends AbstractExtension
{
    public function __construct(
        private readonly RouterInterface $router
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('path', $this->getPath(...)),
        ];
    }

    public function getPath(string $name, array $parameters = []): string
    {
        return (string) $this->router->uri($name, $parameters);
    }
}
