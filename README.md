# Symlink Statamic content from an external location

[![Latest Version on Packagist](https://img.shields.io/packagist/v/doeanderson/statamic-content-link.svg?style=flat-square)](https://packagist.org/packages/doeanderson/statamic-content-link)
[![Total Downloads](https://img.shields.io/packagist/dt/doeanderson/statamic-content-link.svg?style=flat-square)](https://packagist.org/packages/doeanderson/statamic-content-link)

## Installation

You can install the package via composer:

```bash
composer require doeanderson/statamic-content-link
```

Publish the config file with:

```bash
php artisan vendor:publish --tag="statamic-content-link-config"
```

This is the contents of the published config file:

```php
return [
    'content-path' => env('STATAMIC_CONTENT_LINK_CONTENT_PATH'),
    'paths' => [
        base_path('content'),
        base_path('users'),
        public_path('assets'),
        resource_path('forms'),
        resource_path('users'),
        resource_path('blueprints/forms'),
    ],
];
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
