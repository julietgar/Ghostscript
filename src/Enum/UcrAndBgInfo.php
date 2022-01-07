<?php
/**
 * This file is part of the Ghostscript package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\Ghostscript\Enum;

/**
 * The UCR and BG info enum
 *
 * @package Julietgar\Ghostscript\Enum
 */
class UcrAndBgInfo
{
    /**
     * Preserve under color removal and black generation arguments
     */
    const PRESERVE = 'Preserve';

    /**
     * Ignore under color removal and black generation arguments
     */
    const REMOVE = 'Remove';

    /**
     * Available UCR and BG info values
     *
     * @var string[]
     */
    private static $values = [
        self::PRESERVE,
        self::REMOVE
    ];

    /**
     * Get available UCR and BG info values
     *
     * @return string[]
     */
    public static function values()
    {
        return self::$values;
    }
}
