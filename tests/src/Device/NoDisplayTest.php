<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Simon Schrape <s.schrape@epubli.com>
 */

namespace Julietgar\GhostscriptTest\Device;

use Julietgar\Ghostscript\Device\NoDisplay;
use Julietgar\Ghostscript\Ghostscript;
use Julietgar\Ghostscript\Process\Argument;
use Julietgar\Ghostscript\Process\Arguments;
use PHPUnit\Framework\TestCase;

/**
 * The no display device test class.
 *
 * @package Julietgar\GhostscriptTest\Devices
 *
 * @covers  \Julietgar\Ghostscript\Device\NoDisplay
 *
 * @uses    \Julietgar\Ghostscript\Ghostscript
 * @uses    \Julietgar\Ghostscript\Device\AbstractDevice
 * @uses    \Julietgar\Ghostscript\Process\Argument
 * @uses    \Julietgar\Ghostscript\Process\Arguments
 */
class NoDisplayTest extends TestCase
{
    public function testDeviceCreation()
    {
        $ghostscript = new Ghostscript();
        $arguments = new Arguments();

        $device = new NoDisplay($ghostscript, $arguments);

        $this->assertInstanceOf(NoDisplay::class, $device);
        $this->assertInstanceOf(Argument::class, $arguments->getArgument('-dNODISPLAY'));
    }
}
