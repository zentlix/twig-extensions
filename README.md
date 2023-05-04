# Twig Extensions

[![PHP Version Require](https://poser.pugx.org/zentlix/twig-extensions/require/php)](https://packagist.org/packages/zentlix/twig-extensions)
[![Latest Stable Version](https://poser.pugx.org/zentlix/twig-extensions/v/stable)](https://packagist.org/packages/zentlix/twig-extensions)
[![phpunit](https://github.com/zentlix/twig-extensions/actions/workflows/phpunit.yml/badge.svg)](https://github.com/zentlix/twig-extensions/actions)
[![psalm](https://github.com/zentlix/twig-extensions/actions/workflows/psalm.yml/badge.svg)](https://github.com/zentlix/twig-extensions/actions)
[![Codecov](https://codecov.io/gh/zentlix/twig-extensions/branch/1.x/graph/badge.svg)](https://codecov.io/gh/zentlix/twig-extensions)
[![Total Downloads](https://poser.pugx.org/zentlix/twig-extensions/downloads)](https://packagist.org/packages/zentlix/twig-extensions)
[![type-coverage](https://shepherd.dev/github/zentlix/twig-extensions/coverage.svg)](https://shepherd.dev/github/zentlix/twig-extensions)
[![psalm-level](https://shepherd.dev/github/zentlix/twig-extensions/level.svg)](https://shepherd.dev/github/zentlix/twig-extensions)

## Requirements

Make sure that your server is configured with following PHP version and extensions:

- PHP 8.1+
- Spiral framework 3.7+

## Installation

You can install the package via composer:

```bash
composer require zentlix/twig-extensions
```

To enable the package in your Spiral Framework application, you will need to add
the `Zentlix\TwigExtensions\Bootloader\ExtensionsBootloader` class to the list of bootloaders in your application:

```php
protected const LOAD = [
    // ...
    \Zentlix\TwigExtensions\Bootloader\ExtensionsBootloader::class,
];
```

> **Note**
> If you are using [`spiral-packages/discoverer`](https://github.com/spiral-packages/discoverer),
> you don't need to register bootloader by yourself.


## Available functions

### path

Generate valid route URL using route name and set of parameters.

```php
{{ path('user.edit', {'id': 1}) }}
```

## Available filters

### trans

Translates the given message.

```php
{{ 'message' | trans }}
```

## Available tests

### of_type

Checks that the value is of the correct type. Available checks: `array`, `bool`, `object`, `class`, `float`, `int`,
`numeric`, `scalar`, `string`.

```php
{% if someVar is of_type('string') %}
    // ...
{% else %}
    // ...
{% endif %}
```

## Testing

```bash
composer test
```

```bash
composer psalm
```

```bash
composer cs
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
