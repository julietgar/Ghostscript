<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Simon Schrape <s.schrape@epubli.com>
 */

namespace Julietgar\GhostscriptTest\Device;

use Julietgar\Ghostscript\Device\PdfInfo;
use Julietgar\Ghostscript\Ghostscript;
use Julietgar\Ghostscript\Process\Arguments;
use PHPUnit\Framework\TestCase;

/**
 * The pdf info device test class.
 *
 * @package Julietgar\GhostscriptTest\Devices
 *
 * @covers  \Julietgar\Ghostscript\Device\PdfInfo
 *
 * @uses    \Julietgar\Ghostscript\Ghostscript
 * @uses    \Julietgar\Ghostscript\Input
 * @uses    \Julietgar\Ghostscript\Device\AbstractDevice
 * @uses    \Julietgar\Ghostscript\Device\NoDisplay
 * @uses    \Julietgar\Ghostscript\Process\Argument
 * @uses    \Julietgar\Ghostscript\Process\Arguments
 */
class PdfInfoTest extends TestCase
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
        $pdfInfoPath = __DIR__ . '/../../data/pdf_info.ps';

        $device = new PdfInfo($ghostscript, $arguments, $pdfInfoPath);

        $this->assertInstanceOf(PdfInfo::class, $device);

        $field = new \ReflectionProperty(PdfInfo::class, 'pdfInfoPath');
        $field->setAccessible(true);
        $this->assertEquals($pdfInfoPath, $field->getValue($device));
    }

    public function testProcessCreation()
    {
        $ghostscript = new Ghostscript();
        $arguments = new Arguments();
        $pdfInfoPath = __DIR__ . '/../../data/pdf_info.ps';
        $inputFile = __DIR__ . '/../../data/input.pdf';

        $device = new PdfInfo($ghostscript, $arguments, $pdfInfoPath);
        $process = $device->createProcess($inputFile);

        $expectedCommandLine = "'gs' '-dNODISPLAY' '-sFile=$inputFile' '-f' '$pdfInfoPath'";
        $this->assertEquals($expectedCommandLine, $this->quoteCommandLine($process->getCommandLine()));
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testProcessCreationThrowsExceptionOnMissingInputFile()
    {
        $ghostscript = new Ghostscript();
        $arguments = new Arguments();
        $pdfInfoPath = __DIR__ . '/../../data/pdf_info.ps';

        $device = new PdfInfo($ghostscript, $arguments, $pdfInfoPath);
        $device->createProcess();
    }
}
