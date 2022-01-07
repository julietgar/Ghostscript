<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\PdfSettings;
use PHPUnit\Framework\TestCase;

/**
 * The PDF settings enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\PdfSettings
 */
class PdfSettingsTest extends TestCase
{
    public function testValues()
    {
        $values = [
            PdfSettings::__DEFAULT,
            PdfSettings::SCREEN,
            PdfSettings::EBOOK,
            PdfSettings::PRINTER,
            PdfSettings::PREPRESS
        ];

        $this->assertEquals($values, PdfSettings::values());
    }
}
