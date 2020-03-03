<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\CDN\Customization;
use Dagou\FontAwesome\CDN\Local;
use Dagou\FontAwesome\Interfaces\CDN;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

abstract class AbstractLoadViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('all', 'boolean', 'Load all styles or not.', FALSE, TRUE);
        $this->registerArgument('solid', 'boolean', 'Load solid style or not.');
        $this->registerArgument('regular', 'boolean', 'Load regular style or not.');
        $this->registerArgument('brands', 'boolean', 'Load brands style or not.');
        $this->registerArgument('files', 'array', 'Font Awesome file path.');
    }

    /**
     * @param bool $isCustomized
     *
     * @return \Dagou\FontAwesome\Interfaces\CDN
     */
    protected function getCDN(bool $isCustomized): CDN {
        if ($isCustomized) {
            return GeneralUtility::makeInstance(Customization::class);
        }

        if (($className = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN']) && is_subclass_of($className, CDN::class)) {
            return GeneralUtility::makeInstance($className);
        } else {
            return GeneralUtility::makeInstance(Local::class);
        }
    }

    /**
     * @return array
     */
    protected function getStyles(): array {
        $styles = [];

        if ($this->arguments['all']) {
            $styles[] = 'all';
        } else {
            if ($this->arguments['solid']) {
                $styles[] = 'solid';
            }
            if ($this->arguments['regular']) {
                $styles[] = 'regular';
            }
            if ($this->arguments['brands']) {
                $styles[] = 'brands';
            }

            $styles[] = 'fontawesome';
        }

        return $styles;
    }
}