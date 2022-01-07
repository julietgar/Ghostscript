<?php
/**
 * This file is part of the Ghostscript package
 *
 * @author Simon Schrape <s.schrape@epubli.com>
 */

namespace Julietgar\Ghostscript\Device;

use Julietgar\Ghostscript\Ghostscript;
use Julietgar\Ghostscript\Process\Arguments;

/**
 * The bounding box info device class.
 *
 * @link    http://ghostscript.com/doc/current/Devices.htm#Bounding_box_output
 *
 * @package Julietgar\Ghostscript\Devices
 */
class BoundingBoxInfo extends AbstractDevice
{
    /**
     * Create bounding box info device object.
     *
     * @param Ghostscript $ghostscript
     * @param Arguments   $arguments
     */
    public function __construct(Ghostscript $ghostscript, Arguments $arguments)
    {
        parent::__construct($ghostscript, $arguments->setArgument('-sDEVICE=bbox'));
    }
}
