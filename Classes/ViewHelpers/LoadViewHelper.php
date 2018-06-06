<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Cdn\Customization;
use Dagou\FontAwesome\Cdn\Local;
use Dagou\FontAwesome\Interfaces\Cdn;
use Dagou\FontAwesome\Traits\ExtConf;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class LoadViewHelper extends AbstractViewHelper {
    use ExtConf;

    public function initializeArguments() {
        $this->registerArgument('all', 'boolean', 'Load all packages.', FALSE, TRUE);
        $this->registerArgument('solid', 'boolean', 'Load solid package.');
        $this->registerArgument('regular', 'boolean', 'Load regular package.');
        $this->registerArgument('brands', 'boolean', 'Load brands package.');
        $this->registerArgument('type', 'string', 'Package type.', FALSE, 'js');
        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
        $this->registerArgument('packages', 'array', 'Font Awesome packages.');
    }

    public function render() {
        if (is_array($this->arguments['packages'])) {
            $cdn = $this->getCdn(TRUE);

            $cdn->load($this->arguments['packages'], $this->arguments['type'], $this->arguments['footer']);
        } else {
            $cdn = $this->getCdn(FALSE);

            $packages = [];
            if ($this->arguments['all']) {
                $packages[] = 'all';
            }
            if ($this->arguments['solid']) {
                $packages[] = 'solid';
            }
            if ($this->arguments['regular']) {
                $packages[] = 'regular';
            }
            if ($this->arguments['brands']) {
                $packages[] = 'brands';
            }

            $cdn->load($packages, $this->arguments['type'], $this->arguments['footer']);
        }
    }

    /**
     * @param bool $isCustomized
     *
     * @return \Dagou\FontAwesome\Interfaces\Cdn
     */
    protected function getCdn(bool $isCustomized) {
        if ($isCustomized) {
            return GeneralUtility::makeInstance(Customization::class);
        }

        if (($cdnClassName =
            $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN'][$this->getExtConf()['cdn']])) {
            $cdn = GeneralUtility::makeInstance($cdnClassName);

            return $cdn instanceof Cdn ? $cdn : GeneralUtility::makeInstance(Local::class);
        } else {
            return GeneralUtility::makeInstance(Local::class);
        }
    }
}