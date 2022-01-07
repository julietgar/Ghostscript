<?php

namespace Julietgar\Ghostscript\Device;

use Julietgar\Ghostscript\Ghostscript;
use Julietgar\Ghostscript\Process\Argument;
use Julietgar\Ghostscript\Process\Arguments;
use PHPUnit\Framework\TestCase;

/**
 * The inkcov device test class.
 *
 * @package Julietgar\GhostscriptTest\Devices
 *
 * @covers  \Julietgar\Ghostscript\Device\Inkcov
 *
 * @uses    \Julietgar\Ghostscript\Ghostscript
 * @uses    \Julietgar\Ghostscript\Input
 * @uses    \Julietgar\Ghostscript\Device\AbstractDevice
 * @uses    \Julietgar\Ghostscript\Device\NoDisplay
 * @uses    \Julietgar\Ghostscript\Process\Argument
 * @uses    \Julietgar\Ghostscript\Process\Arguments
 */
class InkcovTest extends TestCase
{
    /**
     * Returns an OS independent representation of the commandline.
     *
     * @param string $commandline
     *
     * @return mixed
     */
    protected function quoteCommandLine($commandline)
    {
        if ('WIN' === strtoupper(substr(PHP_OS, 0, 3))) {
            return str_replace('"', '\'', $commandline);
        }

        return $commandline;
    }

    public function testDeviceCreation()
    {
        $ghostscript = new Ghostscript();
        $arguments = new Arguments();

        $device = new Inkcov($ghostscript, $arguments);

        $this->assertInstanceOf(Inkcov::class, $device);
        $this->assertInstanceOf(Argument::class, $arguments->getArgument('-sDEVICE'));
        $this->assertEquals('inkcov', $arguments->getArgument('-sDEVICE')->getValue());
    }
}
