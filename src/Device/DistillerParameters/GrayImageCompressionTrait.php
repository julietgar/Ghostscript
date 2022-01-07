<?php
/**
 * This file is part of the Ghostscript package
 *
 * @author Daniel Schröder <daniel.schroeder@gravitymedia.de>
 */

namespace Julietgar\Ghostscript\Device\DistillerParameters;

use Julietgar\Ghostscript\Enum\ColorAndGrayImageFilter;
use Julietgar\Ghostscript\Enum\ImageDownsampleType;
use Julietgar\Ghostscript\Enum\PdfSettings;

/**
 * The grayscale image compression distiller parameters trait.
 *
 * @package Julietgar\Ghostscript\Device\DistillerParameters
 *
 * @link    http://ghostscript.com/doc/current/Ps2pdf.htm
 */
trait GrayImageCompressionTrait
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
     * Whether to anti alias grayscale images
     *
     * @return bool
     */
    public function isAntiAliasGrayImages()
    {
        $value = $this->getArgumentValue('-dAntiAliasGrayImages');
        if (null === $value) {
            return false;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set anti alias grayscale images flag
     *
     * @param bool $antiAliasGrayImages
     *
     * @return $this
     */
    public function setAntiAliasGrayImages($antiAliasGrayImages)
    {
        $this->setArgument(sprintf('-dAntiAliasGrayImages=%s', $antiAliasGrayImages ? 'true' : 'false'));

        return $this;
    }

    /**
     * Whether to auto filter grayscale images
     *
     * @return bool
     */
    public function isAutoFilterGrayImages()
    {
        $value = $this->getArgumentValue('-dAutoFilterGrayImages');
        if (null === $value) {
            return true;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set auto filter grayscale images flag
     *
     * @param bool $autoFilterGrayImages
     *
     * @return $this
     */
    public function setAutoFilterGrayImages($autoFilterGrayImages)
    {
        $this->setArgument(sprintf('-dAutoFilterGrayImages=%s', $autoFilterGrayImages ? 'true' : 'false'));

        return $this;
    }

    /**
     * Whether to downsample gray images
     *
     * @return bool
     */
    public function isDownsampleGrayImages()
    {
        $value = $this->getArgumentValue('-dDownsampleGrayImages');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::SCREEN:
                case PdfSettings::EBOOK:
                    return true;
                default:
                    return false;
            }
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set downsample gray images flag
     *
     * @param bool $downsampleGrayImages
     *
     * @return $this
     */
    public function setDownsampleGrayImages($downsampleGrayImages)
    {
        $this->setArgument(sprintf('-dDownsampleGrayImages=%s', $downsampleGrayImages ? 'true' : 'false'));

        return $this;
    }

    /**
     * Whether to encode grayscale images
     *
     * @return bool
     */
    public function isEncodeGrayImages()
    {
        $value = $this->getArgumentValue('-dEncodeGrayImages');
        if (null === $value) {
            return true;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Set encode grayscale images flag
     *
     * @param bool $encodeGrayImages
     *
     * @return $this
     */
    public function setEncodeGrayImages($encodeGrayImages)
    {
        $this->setArgument(sprintf('-dEncodeGrayImages=%s', $encodeGrayImages ? 'true' : 'false'));

        return $this;
    }

    /**
     * Get gray image depth
     *
     * @return int
     */
    public function getGrayImageDepth()
    {
        $value = $this->getArgumentValue('-dGrayImageDepth');
        if (null === $value) {
            return -1;
        }

        return intval($value);
    }

    /**
     * Set gray image depth
     *
     * @param int $grayImageDepth
     *
     * @return $this
     */
    public function setGrayImageDepth($grayImageDepth)
    {
        $this->setArgument(sprintf('-dGrayImageDepth=%s', $grayImageDepth));

        return $this;
    }

    /**
     * Get gray image downsample threshold
     *
     * @return float
     */
    public function getGrayImageDownsampleThreshold()
    {
        $value = $this->getArgumentValue('-dGrayImageDownsampleThreshold');
        if (null === $value) {
            return 1.5;
        }

        return floatval($value);
    }

    /**
     * Set gray image downsample threshold
     *
     * @param float $grayImageDownsampleThreshold
     *
     * @return $this
     */
    public function setGrayImageDownsampleThreshold($grayImageDownsampleThreshold)
    {
        $this->setArgument(sprintf('-dGrayImageDownsampleThreshold=%s', $grayImageDownsampleThreshold));

        return $this;
    }

    /**
     * Get gray image downsample type
     *
     * @return string
     */
    public function getGrayImageDownsampleType()
    {
        $value = $this->getArgumentValue('-dGrayImageDownsampleType');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::SCREEN:
                    return ImageDownsampleType::AVERAGE;
                case PdfSettings::EBOOK:
                case PdfSettings::PRINTER:
                case PdfSettings::PREPRESS:
                    return ImageDownsampleType::BICUBIC;
                default:
                    return ImageDownsampleType::SUBSAMPLE;
            }
        }

        return ltrim($value, '/');
    }

    /**
     * Set gray image downsample type
     *
     * @param string $grayImageDownsampleType
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setGrayImageDownsampleType($grayImageDownsampleType)
    {
        $grayImageDownsampleType = ltrim($grayImageDownsampleType, '/');
        if (!in_array($grayImageDownsampleType, ImageDownsampleType::values())) {
            throw new \InvalidArgumentException('Invalid grayscale image downsample type argument');
        }

        $this->setArgument(sprintf('-dGrayImageDownsampleType=/%s', $grayImageDownsampleType));

        return $this;
    }

    /**
     * Get gray image filter
     *
     * @return string
     */
    public function getGrayImageFilter()
    {
        $value = $this->getArgumentValue('-dGrayImageFilter');
        if (null === $value) {
            return ColorAndGrayImageFilter::DCT_ENCODE;
        }

        return ltrim($value, '/');
    }

    /**
     * Set gray image filter
     *
     * @param string $grayImageFilter
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setGrayImageFilter($grayImageFilter)
    {
        $grayImageFilter = ltrim($grayImageFilter, '/');
        if (!in_array($grayImageFilter, ColorAndGrayImageFilter::values())) {
            throw new \InvalidArgumentException('Invalid grayscale image filter argument');
        }

        $this->setArgument(sprintf('-dGrayImageFilter=/%s', $grayImageFilter));

        return $this;
    }

    /**
     * Get gray image resolution
     *
     * @return int
     */
    public function getGrayImageResolution()
    {
        $value = $this->getArgumentValue('-dGrayImageResolution');
        if (null === $value) {
            switch ($this->getPdfSettings()) {
                case PdfSettings::EBOOK:
                    return 150;
                case PdfSettings::PRINTER:
                case PdfSettings::PREPRESS:
                    return 300;
                default:
                    return 72;
            }
        }

        return intval($value);
    }

    /**
     * Set gray image resolution
     *
     * @param int $grayImageResolution
     *
     * @return $this
     */
    public function setGrayImageResolution($grayImageResolution)
    {
        $this->setArgument(sprintf('-dGrayImageResolution=%s', $grayImageResolution));

        return $this;
    }
}
