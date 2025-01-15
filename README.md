# Number Translator Package. Translate number to sonkha (Bangla).

[![Latest Version on Packagist](https://img.shields.io/packagist/v/md-harun-or-roshid/number-translator.svg?style=flat-square)](https://packagist.org/packages/md-harun-or-roshid/number-translator)
[![Tests](https://img.shields.io/github/actions/workflow/status/md-harun-or-roshid/number-translator/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/md-harun-or-roshid/number-translator/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/md-harun-or-roshid/number-translator.svg?style=flat-square)](https://packagist.org/packages/md-harun-or-roshid/number-translator)

This is where your description should go. Try and limit it to a paragraph or two. Consider adding a small example.

## Support us


## Installation

You can install the package via composer:

```bash
  composer require madlab/number-translator
```

## Usage

```php

    NumberTranslator::build("100.1010", NUMBER_TRANSLATOR_ENGLISH, NUMBER_TRANSLATOR_BANGLA);
    Output: "১০০.১০১০"
```

## Testing

```bash
  composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Md. Harun-Or-Roshid](https://github.com/md-harun-or-roshid)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
