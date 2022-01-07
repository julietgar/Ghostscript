<?php
/**
 * This file is part of the Ghostscript package
 *
 * @author Simon Schrape <s.schrape@epubli.com>
 */

namespace Julietgar\Ghostscript\Device\CommandLineParameters;

/**
 * The device and output selection parameters trait.
 *
 * @package Julietgar\Ghostscript\Device\CommandLineParameters
 *
 * @link    http://ghostscript.com/doc/current/Use.htm#Output_selection_parameters
 */
trait OutputSelectionTrait
{
    /**
     * TODO
     *
     * -dNODISPLAY
     *     Initializes Ghostscript with a null device (a device that discards the output image) rather than the default
     *     device or the device selected with -sDEVICE=. This is usually useful only when running PostScript code whose
     *     purpose is to compute something rather than to produce an output image.
     *
     * -sDEVICE=device
     *     Selects an alternate initial output device.
     *
     * -sOutputFile=filename
     *     Selects an alternate output file (or pipe) for the initial output device, as described above.
     *
     * -d.IgnoreNumCopies=true
     *     Some devices implement support for "printing" multiple copies of the input document and some do not, usually
     *     based on whether it makes sense for a particular output format. This switch instructs all devices to ignore
     *     a request to print multiple copies, giving more consistent behaviour.
     */
}
