<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\MonoImageFilter;
use PHPUnit\Framework\TestCase;

/**
 * The monochrome image filter enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\MonoImageFilter
 */
class MonoImageFilterTest extends TestCase
{
    public function testValues()
    {
        $values = [
            MonoImageFilter::CCITT_FAX_ENCODE,
            MonoImageFilter::FLATE_ENCODE,
            MonoImageFilter::RUN_LENGTH_ENCODE
        ];

        $this->assertEquals($values, MonoImageFilter::values());
    }
}
