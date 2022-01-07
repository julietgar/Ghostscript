<?php
/**
 * This file is part of the Ghostscript package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\Ghostscript\Device;

use Julietgar\Ghostscript\Enum\AutoRotatePages;
use Julietgar\Ghostscript\Enum\Binding;
use Julietgar\Ghostscript\Enum\PdfSettings;

/**
 * The general distiller parameters trait.
 *
 * @package Julietgar\Ghostscript\Devices
 *
 * @link    http://ghostscript.com/doc/current/Ps2pdf.htm
 */
trait DistillerParametersTrait
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
     * Get auto rotate pages
     *
     * @return string
     */
    public function getAutoRotatePages()
    {
        $value = $this->getArgumentValue('-dAutoRotatePages');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::EBOOK:
                    return AutoRotatePages::ALL;
                case PdfSettings::PRINTER:
                case PdfSettings::PREPRESS:
                    return AutoRotatePages::NONE;
                default:
                    return AutoRotatePages::PAGE_BY_PAGE;
            }
        }

        return ltrim($value, '/');
    }

    /**
     * Set auto rotate pages
     *
     * @param string $autoRotatePages
     *
     * @param \InvalidArgumentException
     *
     * @return $this
     */
    public function setAutoRotatePages($autoRotatePages)
    {
        $autoRotatePages = ltrim($autoRotatePages, '/');
        if (!in_array($autoRotatePages, AutoRotatePages::values())) {
            throw new \InvalidArgumentException('Invalid auto rotate pages argument');
        }

        $this->setArgument(sprintf('-dAutoRotatePages=/%s', $autoRotatePages));

        return $this;
    }

    /**
     * Get binding
     *
     * @return string
     */
    public function getBinding()
    {
        $value = $this->getArgumentValue('-dBinding');
        if (null === $value) {
            return Binding::LEFT;
        }

        return ltrim($value, '/');
    }

    /**
     * Set binding
     *
     * @param string $binding
     *
     * @param \InvalidArgumentException
     *
     * @return $this
     */
    public function setBinding($binding)
    {
        $binding = ltrim($binding, '/');
        if (!in_array($binding, Binding::values())) {
            throw new \InvalidArgumentException('Invalid binding argument');
        }

        $this->setArgument(sprintf('-dBinding=/%s', $binding));

        return $this;
    }

    /**
     * Get compatibility level
     *
     * @return float
     */
    public function getCompatibilityLevel()
    {
        $value = $this->getArgumentValue('-dCompatibilityLevel');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::SCREEN:
                    return 1.3;
                default:
                    return 1.4;
            }
        }

        return floatval($value);
    }

    /**
     * Set compatibility level
     *
     * @param float $compatibilityLevel
     *
     * @return $this
     */
    public function setCompatibilityLevel($compatibilityLevel)
    {
        $this->setArgument(sprintf('-dCompatibilityLevel=%s', $compatibilityLevel));

        return $this;
    }

    /**
     * Get core dist version
     *
     * @return int
     */
    public function getCoreDistVersion()
    {
        $value = $this->getArgumentValue('-dCoreDistVersion');
        if (null === $value) {
            return 4000;
        }

        return intval($value);
    }

    /**
     * Set core dist version
     *
     * @param int $coreDistVersion
     *
     * @return $this
     */
    public function setCoreDistVersion($coreDistVersion)
    {
        $this->setArgument(sprintf('-dCoreDistVersion=%s', $coreDistVersion));

        return $this;
    }

    /**
     * Whether to do thumbnails
     *
     * @return bool
     */
    public function isDoThumbnails()
    {
        $value = $this->getArgumentValue('-dDoThumbnails');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::PREPRESS:
                    return true;
                default:
                    return false;
            }
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set do thumbnails flag
     *
     * @param bool $doThumbnails
     *
     * @return $this
     */
    public function setDoThumbnails($doThumbnails)
    {
        $this->setArgument(sprintf('-dDoThumbnails=%s', $doThumbnails ? 'true' : 'false'));

        return $this;
    }

    /**
     * Get end page
     *
     * @return int
     */
    public function getEndPage()
    {
        $value = $this->getArgumentValue('-dEndPage');
        if (null === $value) {
            return -1;
        }

        return intval($value);
    }

    /**
     * Set end page
     *
     * @param int $endPage
     *
     * @return $this
     */
    public function setEndPage($endPage)
    {
        $this->setArgument(sprintf('-dEndPage=%s', $endPage));

        return $this;
    }

    /**
     * Get image memory
     *
     * @return int
     */
    public function getImageMemory()
    {
        $value = $this->getArgumentValue('-dImageMemory');
        if (null === $value) {
            return 524288;
        }

        return intval($value);
    }

    /**
     * Set image memory
     *
     * @param int $imageMemory
     *
     * @return $this
     */
    public function setImageMemory($imageMemory)
    {
        $this->setArgument(sprintf('-dImageMemory=%s', $imageMemory));

        return $this;
    }

    /**
     * Get off optimizations
     *
     * @return int
     */
    public function getOffOptimizations()
    {
        $value = $this->getArgumentValue('-dOffOptimizations');
        if (null === $value) {
            return 0;
        }

        return intval($value);
    }

    /**
     * Set off optimizations
     *
     * @param int $offOptimizations
     *
     * @return $this
     */
    public function setOffOptimizations($offOptimizations)
    {
        $this->setArgument(sprintf('-dOffOptimizations=%s', $offOptimizations));

        return $this;
    }

    /**
     * Whether to optimize
     *
     * @return bool
     */
    public function isOptimize()
    {
        $value = $this->getArgumentValue('-dOptimize');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::SCREEN:
                case PdfSettings::EBOOK:
                case PdfSettings::PRINTER:
                case PdfSettings::PREPRESS:
                    return true;
                default:
                    return false;
            }
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set optimize flag
     *
     * @param bool $optimize
     *
     * @return $this
     */
    public function setOptimize($optimize)
    {
        $this->setArgument(sprintf('-dOptimize=%s', $optimize ? 'true' : 'false'));

        return $this;
    }

    /**
     * Get start page
     *
     * @return int
     */
    public function getStartPage()
    {
        $value = $this->getArgumentValue('-dStartPage');
        if (null === $value) {
            return 1;
        }

        return intval($value);
    }

    /**
     * Set start page
     *
     * @param int $startPage
     *
     * @return $this
     */
    public function setStartPage($startPage)
    {
        $this->setArgument(sprintf('-dStartPage=%s', $startPage));

        return $this;
    }

    /**
     * Whether to use flate compression
     *
     * @return bool
     */
    public function isUseFlateCompression()
    {
        $value = $this->getArgumentValue('-dUseFlateCompression');
        if (null === $value) {
            return true;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set use flate compression flag
     *
     * @param bool $useFlateCompression
     *
     * @return $this
     */
    public function setUseFlateCompression($useFlateCompression)
    {
        $this->setArgument(sprintf('-dUseFlateCompression=%s', $useFlateCompression ? 'true' : 'false'));

        return $this;
    }
}
