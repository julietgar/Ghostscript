<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\Binding;
use PHPUnit\Framework\TestCase;

/**
 * The binding enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\Binding
 */
class BindingTest extends TestCase
{
    public function testValues()
    {
        $values = [
            Binding::LEFT,
            Binding::RIGHT
        ];

        $this->assertEquals($values, Binding::values());
    }
}
