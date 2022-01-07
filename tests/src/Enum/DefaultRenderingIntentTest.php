<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\DefaultRenderingIntent;
use PHPUnit\Framework\TestCase;

/**
 * The default rendering intent enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\DefaultRenderingIntent
 */
class DefaultRenderingIntentTest extends TestCase
{
    public function testValues()
    {
        $values = [
            DefaultRenderingIntent::__DEFAULT,
            DefaultRenderingIntent::PERCEPTUAL,
            DefaultRenderingIntent::SATURATION,
            DefaultRenderingIntent::RELATIVE_COLORIMETRIC,
            DefaultRenderingIntent::ABSOLUTE_COLORIMETRIC
        ];

        $this->assertEquals($values, DefaultRenderingIntent::values());
    }
}
