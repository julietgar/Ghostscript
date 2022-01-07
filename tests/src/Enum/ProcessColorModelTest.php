<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Simon Schrape <s.schrape@epubli.com>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\ProcessColorModel;
use PHPUnit\Framework\TestCase;

/**
 * The binding enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\ProcessColorModel
 */
class ProcessColorModelTest extends TestCase
{
    public function testValues()
    {
        $values = [
            ProcessColorModel::DEVICE_RGB,
            ProcessColorModel::DEVICE_CMYK,
            ProcessColorModel::DEVICE_GRAY
        ];

        $this->assertEquals($values, ProcessColorModel::values());
    }
}
