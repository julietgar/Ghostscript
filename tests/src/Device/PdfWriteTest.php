<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Device;

use Julietgar\Ghostscript\Device\PdfWrite;
use Julietgar\Ghostscript\Enum\PdfSettings;
use Julietgar\Ghostscript\Enum\ProcessColorModel;
use Julietgar\Ghostscript\Ghostscript;
use Julietgar\Ghostscript\Process\Arguments as ProcessArguments;
use PHPUnit\Framework\TestCase;

/**
 * The PDF write device test class.
 *
 * @package Julietgar\GhostscriptTest\Devices
 *
 * @covers  \Julietgar\Ghostscript\Device\PdfWrite
 *
 * @uses    \Julietgar\Ghostscript\Ghostscript
 * @uses    \Julietgar\Ghostscript\Input
 * @uses    \Julietgar\Ghostscript\Enum\PdfSettings
 * @uses    \Julietgar\Ghostscript\Enum\ProcessColorModel
 * @uses    \Julietgar\Ghostscript\Device\AbstractDevice
 * @uses    \Julietgar\Ghostscript\Device\DistillerParametersTrait
 * @uses    \Julietgar\Ghostscript\Process\Argument
 * @uses    \Julietgar\Ghostscript\Process\Arguments
 */
class PdfWriteTest extends TestCase
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

    /**
     * @return PdfWrite
     */
    protected function createDevice()
    {
        $ghostscript = new Ghostscript();
        $processArguments = new ProcessArguments();

        return new PdfWrite($ghostscript, $processArguments);
    }

    public function testDeviceCreation()
    {
        $this->assertInstanceOf('Julietgar\Ghostscript\Device\PdfWrite', $this->createDevice());
    }

    public function testOutputFileArgument()
    {
        $device = $this->createDevice();
        $outputFile = '/path/to/output/file.pdf';

        $this->assertNull($device->getOutputFile());
        $this->assertSame($outputFile, $device->setOutputFile($outputFile)->getOutputFile());
    }

    /**
     * @dataProvider providePdfSettings
     *
     * @param string $pdfSettings
     */
    public function testPdfSettingsArgument($pdfSettings)
    {
        $device = $this->createDevice();

        $this->assertSame(PdfSettings::__DEFAULT, $device->getPdfSettings());
        $this->assertSame($pdfSettings, $device->setPdfSettings($pdfSettings)->getPdfSettings());
    }

    /**
     * @return string[]
     */
    public function providePdfSettings()
    {
        return [
            [PdfSettings::__DEFAULT],
            [PdfSettings::SCREEN],
            [PdfSettings::EBOOK],
            [PdfSettings::PRINTER],
            [PdfSettings::PREPRESS]
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPdfSettingsSetterThrowsExceptionOnInvalidArgument()
    {
        $this->createDevice()->setPdfSettings('/foo');
    }

    /**
     * @dataProvider provideProcessColorModel
     *
     * @param string $processColorModel
     */
    public function testProcessColorModelArgument($processColorModel)
    {
        $device = $this->createDevice();
        $this->assertSame($processColorModel, $device->setProcessColorModel($processColorModel)->getProcessColorModel());
    }

    /**
     * @return string[]
     */
    public function provideProcessColorModel()
    {
        return [
            [ProcessColorModel::DEVICE_RGB],
            [ProcessColorModel::DEVICE_CMYK],
            [ProcessColorModel::DEVICE_GRAY]
        ];
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testProcessColorModelSetterThrowsExceptionOnInvalidArgument()
    {
        $this->createDevice()->setProcessColorModel('/foo');
    }

    public function testProcessCreation()
    {
        $process = $this->createDevice()->createProcess();

        $this->assertEquals(
            "'gs' '-sDEVICE=pdfwrite' '-dPDFSETTINGS=/default' '-c' '.setpdfwrite'",
            $this->quoteCommandLine($process->getCommandLine())
        );
    }
}
