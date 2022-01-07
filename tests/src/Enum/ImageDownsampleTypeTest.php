<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\ImageDownsampleType;
use PHPUnit\Framework\TestCase;

/**
 * The image downsample type enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\ImageDownsampleType
 */
class ImageDownsampleTypeTest extends TestCase
{
    public function testValues()
    {
        $values = [
            ImageDownsampleType::AVERAGE,
            ImageDownsampleType::BICUBIC,
            ImageDownsampleType::SUBSAMPLE,
            ImageDownsampleType::NONE,
        ];

        $this->assertEquals($values, ImageDownsampleType::values());
    }
}
