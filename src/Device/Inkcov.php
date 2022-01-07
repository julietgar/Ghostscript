<?php
/**
 * This file is part of the Ghostscript package
 */

namespace Julietgar\Ghostscript\Device;

use Julietgar\Ghostscript\Ghostscript;
use Julietgar\Ghostscript\Process\Arguments as ProcessArguments;
use Julietgar\Ghostscript\Process\Arguments;

/**
 * @package Julietgar\Ghostscript\Devices
 */
class Inkcov extends AbstractDevice
{
    const POSTSCRIPT_COMMANDS = '';

    /**
     * @param Ghostscript $ghostscript
     * @param ProcessArguments $arguments
     */
    public function __construct(Ghostscript $ghostscript, Arguments $arguments)
    {
        parent::__construct($ghostscript, $arguments->setArgument('-sDEVICE=inkcov'));
    }
}
