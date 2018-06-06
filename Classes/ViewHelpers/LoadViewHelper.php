<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Cdn\Customization;
use Dagou\FontAwesome\Cdn\Local;
use Dagou\FontAwesome\Interfaces\Cdn;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class LoadViewHelper extends AbstractViewHelper {
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
        print_r($this->arguments);
        //$this->getCdn();
    }

    /**
     * @param bool $isCustomized
     *
     * @return \Dagou\FontAwesome\Interfaces\Cdn
     */
    protected function getCdn(bool $isCustomized) {
        if ($isCustomized) {
            return GeneralUtility::makeInstance(Customization::VERSION);
        }

        if (($cdnClassName =
            GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN'][$this->getExtConf()['cdn']])) {
            $cdn = GeneralUtility::makeInstance($cdnClassName);

            return $cdn instanceof Cdn ? $cdn : GeneralUtility::makeInstance(Local::class);
        } else {
            return GeneralUtility::makeInstance(Local::class);
        }
    }
}