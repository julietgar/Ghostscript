<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Enum;

use Julietgar\Ghostscript\Enum\CannotEmbedFontPolicy;
use PHPUnit\Framework\TestCase;

/**
 * The cannot embed font policy enum test class
 *
 * @package Julietgar\GhostscriptTest\Enum
 *
 * @covers  \Julietgar\Ghostscript\Enum\CannotEmbedFontPolicy
 */
class CannotEmbedFontPolicyTest extends TestCase
{
    public function testValues()
    {
        $values = [
            CannotEmbedFontPolicy::OK,
            CannotEmbedFontPolicy::WARNING,
            CannotEmbedFontPolicy::ERROR
        ];

        $this->assertEquals($values, CannotEmbedFontPolicy::values());
    }
}
