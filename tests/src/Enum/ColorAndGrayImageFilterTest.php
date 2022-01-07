<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\ColorAndGrayImageFilter;
use PHPUnit\Framework\TestCase;

/**
 * The color and grayscale image filter enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\ColorAndGrayImageFilter
 */
class ColorAndGrayImageFilterTest extends TestCase
{
    public function testValues()
    {
        $values = [
            ColorAndGrayImageFilter::DCT_ENCODE,
            ColorAndGrayImageFilter::FLATE_ENCODE
        ];

        $this->assertEquals($values, ColorAndGrayImageFilter::values());
    }
}
