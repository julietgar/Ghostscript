<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\TransferFunctionInfo;
use PHPUnit\Framework\TestCase;

/**
 * The transfer function info enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\TransferFunctionInfo
 */
class TransferFunctionInfoTest extends TestCase
{
    public function testValues()
    {
        $values = [
            TransferFunctionInfo::PRESERVE,
            TransferFunctionInfo::REMOVE,
            TransferFunctionInfo::APPLY
        ];

        $this->assertEquals($values, TransferFunctionInfo::values());
    }
}
