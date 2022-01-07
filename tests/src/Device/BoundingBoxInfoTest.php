<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Simon Schrape <s.schrape@epubli.com>
 */

namespace Julietgar\GhostscriptTest\Device;

use Julietgar\Ghostscript\Device\BoundingBoxInfo;
use Julietgar\Ghostscript\Ghostscript;
use Julietgar\Ghostscript\Process\Argument;
use Julietgar\Ghostscript\Process\Arguments;
use PHPUnit\Framework\TestCase;

/**
 * The bounding box info device test class.
 *
 * @package Julietgar\GhostscriptTest\Devices
 *
 * @covers  \Julietgar\Ghostscript\Device\BoundingBoxInfo
 *
 * @uses    \Julietgar\Ghostscript\Ghostscript
 * @uses    \Julietgar\Ghostscript\Device\AbstractDevice
 * @uses    \Julietgar\Ghostscript\Process\Argument
 * @uses    \Julietgar\Ghostscript\Process\Arguments
 */
class BoundingBoxInfoTest extends TestCase
{
    public function testDeviceCreation()
    {
        $ghostscript = new Ghostscript();
        $arguments = new Arguments();

        $device = new BoundingBoxInfo($ghostscript, $arguments);

        $this->assertInstanceOf(BoundingBoxInfo::class, $device);

        $argument = $arguments->getArgument('-sDEVICE');

        $this->assertInstanceOf(Argument::class, $argument);
        $this->assertEquals('bbox', $argument->getValue());
    }
}
