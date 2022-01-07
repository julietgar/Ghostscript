<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\UcrAndBgInfo;
use PHPUnit\Framework\TestCase;

/**
 * The UCR and BG info enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\UcrAndBgInfo
 */
class UcrAndBgInfoTest extends TestCase
{
    public function testValues()
    {
        $values = [
            UcrAndBgInfo::PRESERVE,
            UcrAndBgInfo::REMOVE
        ];

        $this->assertEquals($values, UcrAndBgInfo::values());
    }
}
