# Ghostscript

[![Software License](https://img.shields.io/packagist/l/gravitymedia/ghostscript.svg)](LICENSE.md)
[![Quality Score](https://img.shields.io/scrutinizer/g/GravityMedia/Ghostscript.svg)](https://scrutinizer-ci.com/g/GravityMedia/Ghostscript)

Ghostscript is an object oriented Ghostscript binary wrapper for PHP.

Forked from https://github.com/GravityMedia/Ghostscript

## Requirements

This library has the following requirements:

 - PHP 8.0+
 - Ghostscript 9.00+

## Installation

Install Composer in your project:

```bash
$ curl -s https://getcomposer.org/installer | php
```

Require the package via Composer:

```bash
$ php composer.phar require julietgar/ghostscript:v2.0
```

## Usage

This is a simple usage example how to convert an input PDF to an output PDF. 

```php
// Initialize autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Import classes
use Julietgar\Ghostscript\Ghostscript;
use Symfony\Component\Process\Process;

// Define input and output files
$inputFile = '/path/to/input/file.pdf';
$outputFile = '/path/to/output/file.pdf';

// Create Ghostscript object
$ghostscript = new Ghostscript([
    'quiet' => false
]);

// Create and configure the device
$device = $ghostscript->createPdfDevice($outputFile);
$device->setCompatibilityLevel(1.4);

// Create process
$process = $device->createProcess($inputFile);

// Print the command line
print '$ ' . $process->getCommandLine() . PHP_EOL;

// Run process
$process->run(function ($type, $buffer) {
    if ($type === Process::ERR) {
        throw new \RuntimeException($buffer);
    }

    print $buffer;
});
```

## Testing

Clone this repository, install Composer and all dependencies:

```bash
$ php composer.phar install
```

Run the test suite:

```bash
$ php composer.phar test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Daniel Schröder](https://github.com/pCoLaSD)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
