# Navpi - PHP

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bildvitta/navpi-php?include_prereleases&style=flat-square)](https://packagist.org/packages/bildvitta/navpi-php)
[![Total Downloads](https://img.shields.io/packagist/dm/bildvitta/navpi-php?style=flat-square)](https://packagist.org/packages/bildvitta/navpi-php)
[![PHP Tests](https://github.com/bildvitta/navpi-php/actions/workflows/php.yml/badge.svg?branch=master)](https://github.com/bildvitta/navpi-php/actions/workflows/php.yml)
[![License](https://img.shields.io/packagist/l/bildvitta/navpi-php?style=flat-square)](https://packagist.org/packages/bildvitta/navpi-php)

This package was created to assist in the development of API's for the standard used in [asteroid](https://github.com/bildvitta/asteroid).

## Installation

You can install the package via composer:

```bash
composer require bildvitta/navpi-php
```

## Usage

``` php
use Bildvitta\Navpi\Fields;
use Bildvitta\Navpi\NavpiResource;

class CustomResource extends NavpiResource
{
    protected function fieldsMap()
    {
        return [
            'name' => (new Fields\TextField('name'))
                ->label('Nome completo')
                ->exceptActions(['filters']),
        ];
    }
}
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email backend@bild.com.br instead of using the issue tracker.

## Credits

- [Backend](https://github.com/bildvitta)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
