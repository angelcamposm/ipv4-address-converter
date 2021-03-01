# IPv4 Address Converter

[![License](https://poser.pugx.org/acamposm/ipv4-address-converter/license)](https://packagist.org/packages/acamposm/ipv4-address-converter)
[![Latest Stable Version](https://poser.pugx.org/acamposm/ipv4-address-converter/v/stable)](https://packagist.org/packages/acamposm/ipv4-address-converter)
[![Latest Unstable Version](https://poser.pugx.org/acamposm/ipv4-address-converter/v/unstable)](https://packagist.org/packages/acamposm/ipv4-address-converter)
[![Build Status](https://travis-ci.com/angelcamposm/ipv4-address-converter.svg?branch=master)](https://travis-ci.com/angelcamposm/ipv4-address-converter)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/angelcamposm/ipv4-address-converter/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/angelcamposm/ipv4-address-converter/?branch=master)
[![StyleCI](https://github.styleci.io/repos/343186632/shield?style=flat&branch=master)](https://github.styleci.io/repos/343186632)
[![Total Downloads](https://poser.pugx.org/acamposm/ipv4-address-converter/downloads)](https://packagist.org/packages/acamposm/ipv4-address-converter)

This PHP package allows you to perform IPv4 Address conversion within Laravel applications.

- [Features](#features)
  - [Conversions](#conversions)
- [Installation](#installation)
- [Usage](#usage)
    - [Input methods](#input-methods)
    - [Output methods](#output-methods)
    - [Modifiers](#modifiers)
- [Sample outputs](#sample-outputs)
- [Testing](#testing)
- [Changelog](#changelog)
- [Contributing](#contributing)
- [Security Vulnerabilities](#security-vulnerabilities)
- [Standards](#standards)
- [Credits](#credits)
- [License](#license)

## Features

The package accepts an IP address as an input and converts it to a specified IP address format.  
The input and output can be one of these formats: binary string, dotted decimal, hexadecimal string, or long integer

### Conversions

Converts from:

- Binary
- Decimal
- Hexadecimal
- Long

Converts to:

- Binary
- Decimal
- Hexadecimal
- Long

## Installation

You can install the package via [composer](https://getcomposer.org/) and then publish the assets:

Add the library to your composer.json file:

```json
{
  "require": {
    "acamposm/ipv4-address-converter": "^1.0"
  }
}
```

Or use composer to install the library:

```bash
composer require acamposm/ipv4-address-converter
```

***Note:*** We try to follow [SemVer v2.0.0](https://semver.org/).

## Usage

### Input Methods

These are the valid input methods for the conversion of the IP Addresses.

#### fromBinary

Set the input for the IP Address conversion as a binary string.

| accepts | `string` $address     |
| ---     | ---                   |
| returns | IPv4AddressConverter  |

#### fromDecimal

Set the input for the IP Address conversion as a doted decimal string.

| accepts | `string` $address     |
| ---     | ---                   |
| returns | IPv4AddressConverter  |

#### fromHexadecimal

Set the input for the IP Address conversion as a hexadecimal string.

| accepts | `string` $address     |
| ---     | ---                   |
| returns | IPv4AddressConverter  |

#### fromLong

Set the input for the IP Address conversion as a long integer.

| accepts | `string` $address     |
| ---     | ---                   |
| returns | IPv4AddressConverter  |

### Output Methods

These methods are valid output methods for the conversion of the IP address specified in the previous input methods.

#### toBinary

Set binary string as desired output format.

#### toDecimal

Set dotted decimal as desired output format.

#### toHexadecimal

Set hexadecimal string as desired output format.

#### toLong

Set long integer as desired output format.

### Modifiers

With these modifiers we can control the output of the conversion operation.

#### withDotNotation

This modifier will apply dot notation to the output of the conversion, only available to binary strings and hexadecimal strings.

## Sample outputs

### From Decimal to Long Integer

This example shows how to convert a dotted-decimal IP address to a long integer IP address.

```php
use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

$converter = IPv4AddressConverter::convert()
  ->fromDecimal('192.168.10.254')
  ->toLong()
  ->get();

var_dump($converter);
```

The output of the conversion is a integer.

```
int(3232238334)
```

### From Decimal to Binary String

This example shows how to convert a dotted decimal IP address to binary string IP address.

```php
use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

$converter = IPv4AddressConverter::convert()
  ->fromDecimal('192.168.10.254')
  ->toBinary()
  ->get();

var_dump($converter);
```

The output is a binary string IP Address.

```
string(32) "11000000101010000000101011111110"
```

### From Decimal to Binary String with Dot Notation

This example shows how to convert a dotted-decimal IP address to binary string IP address with dot notation.

```php
use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

$converter = IPv4AddressConverter::convert()
  ->fromDecimal('192.168.10.254')
  ->toBinary()
  ->withDotNotation()
  ->get();

var_dump($converter);
```

The output is a binary string IP Address with dot notation.

```
string(35) "11000000.10101000.00001010.11111110"
```

### From Decimal to Hexadecimal

This example shows how to convert a dotted-decimal IP address to a hexadecimal string IP address.

```php
use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

$converter = IPv4AddressConverter::convert()
  ->fromDecimal('192.168.10.254')
  ->toHexadecimal()
  ->get();

var_dump($converter);
```

The output of the conversion is a hexadecimal string IP address.

```
string(8) "C0A80AFE"
```

### From Decimal to Hexadecimal with Dot Notation

This example shows how to convert a dotted-decimal IP address to a hexadecimal string IP address with dot notation.

```php
use Acamposm\IPv4AddressConverter\IPv4AddressConverter;

$converter = IPv4AddressConverter::convert()
  ->fromDecimal('192.168.10.254')
  ->toHexadecimal()
  ->withDotNotation()
  ->get();

var_dump($converter);
```

The output of the conversion is a hexadecimal string IP address with dot notation.

```
string(11) "C0.A8.0A.FE"
```

## Testing

To run the tests you only need to run this command:

```bash
composer test
```

## Changelog

Please see [CHANGELOG.md](https://github.com/angelcamposm/ipv4-address-converter/CHANGELOG.md) for more information what has changed recently.

## Contributing

Thank you for considering contributing to the improvement of the package. Please see [CONTRIBUTING.md](https://github.com/angelcamposm/ipv4-address-converter/CONTRIBUTING.md) for details.

## Security Vulnerabilities

If you discover any security related issues, please send an e-mail to Angel Campos via angel.campos.m@outlook.com instead of using the issue tracker. All security vulnerabilities will be promptly addressed.

## Standards

The php package IPv4 Address Converter, comply with the next standards:

- [PSR-1 - Basic Coding Standard](http://www.php-fig.org/psr/psr-1/)
- [PSR-4 - Autoloading Standard](http://www.php-fig.org/psr/psr-4/)
- [PSR-12 - Extended Coding Style Guide](hhttps://www.php-fig.org/psr/psr-12/)

## Credits

Angel Campos

## License

The package IPv4 Address Converter is an open-source package and is licensed under The MIT License (MIT). Please see [License File](https://github.com/angelcamposm/ipv4-address-converter/LICENSE.md) for more information.