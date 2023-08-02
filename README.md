# Russian email validation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kolyayurev/russian-email-validation.svg?style=flat-square)](https://packagist.org/packages/kolyayurev/russian-email-validation)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kolyayurev/russian-email-validation/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kolyayurev/russian-email-validation/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kolyayurev/russian-email-validation/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kolyayurev/russian-email-validation/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kolyayurev/russian-email-validation.svg?style=flat-square)](https://packagist.org/packages/kolyayurev/russian-email-validation)


## Installation

You can install the package via composer:

```bash
composer require kolyayurev/russian-email-validation
```


You can publish the config file with:

```bash
php artisan vendor:publish --tag="russian-email-validation-config"
```

You can publish lang files with:

```bash
php artisan vendor:publish --tag="russian-email-validation-lang"
```


## Usage

```php

use Kolyayurev\RussianEmailValidation\Rules\RussianEmail;
 
$request->validate([
    'email' => ['email', new RussianEmail],
]);

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Credits

- [kolyayurev](https://github.com/kolyayurev)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
