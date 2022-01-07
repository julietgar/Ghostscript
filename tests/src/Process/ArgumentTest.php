<?php
/**
 * This file is part of the Ghostscript test package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\GhostscriptTest\Process;

use Julietgar\Ghostscript\Process\Argument;
use PHPUnit\Framework\TestCase;

/**
 * The process argument test class.
 *
 * @package Julietgar\GhostscriptTest\Process
 *
 * @covers  \Julietgar\Ghostscript\Process\Argument
 */
class ArgumentTest extends TestCase
{
    /**
     * @dataProvider provideConstructorArguments
     *
     * @param string $name
     * @param mixed  $value
     */
    public function testArgumentConstruction($name, $value)
    {
        $instance = new Argument($name, $value);

        $this->assertSame($name, $instance->getName());
        $this->assertSame($value, $instance->getValue());
    }

    /**
     * @return array
     */
    public function provideConstructorArguments()
    {
        return [
            ['name', null],
            ['name', 'value']
        ];
    }

    /**
     * @dataProvider provideArgumentStrings
     *
     * @param string $string
     * @param string $name
     * @param mixed  $value
     */
    public function testArgumentConstructionFromString($string, $name, $value)
    {
        $instance = Argument::fromString($string);

        $this->assertSame($name, $instance->getName());
        $this->assertSame($value, $instance->getValue());
    }

    /**
     * @dataProvider provideArgumentStrings
     *
     * @param string $string
     * @param string $name
     * @param mixed  $value
     */
    public function testArgumentStringResult($string, $name, $value)
    {
        $instance = new Argument($name, $value);

        $this->assertSame($string, $instance->toString());
    }

    /**
     * @return array
     */
    public function provideArgumentStrings()
    {
        return [
            ['name', 'name', null],
            ['name=value', 'name', 'value']
        ];
    }
}
