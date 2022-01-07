<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\ColorConversionStrategy;
use PHPUnit\Framework\TestCase;

/**
 * The color conversion strategy enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\ColorConversionStrategy
 */
class ColorConversionStrategyTest extends TestCase
{
    public function testValues()
    {
        $values = [
            ColorConversionStrategy::LEAVE_COLOR_UNCHANGED,
            ColorConversionStrategy::USE_DEVICE_INDEPENDENT_COLOR,
            ColorConversionStrategy::GRAY,
            ColorConversionStrategy::SRGB,
            ColorConversionStrategy::CMYK
        ];

        $this->assertEquals($values, ColorConversionStrategy::values());
    }
}
