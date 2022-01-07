<?php
/**
 * This file is part of the Ghostscript package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\Ghostscript\Device\DistillerParameters;

use Julietgar\Ghostscript\Enum\CannotEmbedFontPolicy;
use Julietgar\Ghostscript\Enum\PdfSettings;

/**
 * The font distiller parameters trait.
 *
 * @package Julietgar\Ghostscript\Device\DistillerParameters
 *
 * @link    http://ghostscript.com/doc/current/Ps2pdf.htm
 */
trait FontTrait
{
    /**
     * Get argument value
     *
     * @param string $name
     *
     * @return null|string
     */
    abstract protected function getArgumentValue($name);

    /**
     * Set argument
     *
     * @param string $argument
     *
     * @return $this
     */
    abstract protected function setArgument($argument);

    /**
     * Get PDF settings
     *
     * @return string
     */
    abstract public function getPdfSettings();

    /**
     * Get cannot embed font policy
     *
     * @return string
     */
    public function getCannotEmbedFontPolicy()
    {
        $value = $this->getArgumentValue('-dCannotEmbedFontPolicy');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::PREPRESS:
                    return CannotEmbedFontPolicy::ERROR;
                default:
                    return CannotEmbedFontPolicy::WARNING;
            }
        }

        return ltrim($value, '/');
    }

    /**
     * Set cannot embed font policy
     *
     * @param string $cannotEmbedFontPolicy
     *
     * @param \InvalidArgumentException
     *
     * @return $this
     */
    public function setCannotEmbedFontPolicy($cannotEmbedFontPolicy)
    {
        $cannotEmbedFontPolicy = ltrim($cannotEmbedFontPolicy, '/');
        if (!in_array($cannotEmbedFontPolicy, CannotEmbedFontPolicy::values())) {
            throw new \InvalidArgumentException('Invalid cannot embed font policy argument');
        }

        $this->setArgument(sprintf('-dCannotEmbedFontPolicy=/%s', $cannotEmbedFontPolicy));

        return $this;
    }

    /**
     * Whether to embed all fonts
     *
     * @return bool
     */
    public function isEmbedAllFonts()
    {
        $value = $this->getArgumentValue('-dEmbedAllFonts');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::SCREEN:
                    return false;
                default:
                    return true;
            }
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set embed all fonts flag
     *
     * @param string $embedAllFonts
     *
     * @return $this
     */
    public function setEmbedAllFonts($embedAllFonts)
    {
        $this->setArgument(sprintf('-dEmbedAllFonts=%s', $embedAllFonts ? 'true' : 'false'));

        return $this;
    }

    /**
     * Get max subset pct
     *
     * @return int
     */
    public function getMaxSubsetPct()
    {
        $value = $this->getArgumentValue('-dMaxSubsetPct');
        if (null === $value) {
            return 100;
        }

        return intval($value);
    }

    /**
     * Set max subset pct
     *
     * @param int $maxSubsetPct
     *
     * @return $this
     */
    public function setMaxSubsetPct($maxSubsetPct)
    {
        $this->setArgument(sprintf('-dMaxSubsetPct=%s', $maxSubsetPct));

        return $this;
    }

    /**
     * Whether to subset fonts
     *
     * @return bool
     */
    public function isSubsetFonts()
    {
        $value = $this->getArgumentValue('-dSubsetFonts');
        if (null === $value) {
            return true;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set subset fonts flag
     *
     * @param bool $subsetFonts
     *
     * @return $this
     */
    public function setSubsetFonts($subsetFonts)
    {
        $this->setArgument(sprintf('-dSubsetFonts=%s', $subsetFonts ? 'true' : 'false'));

        return $this;
    }
}
