<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\CDN\Customization;
use Dagou\FontAwesome\CDN\Local;
use Dagou\FontAwesome\Interfaces\CDN;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class LoadViewHelper extends AbstractViewHelper {
    public function initializeArguments() {
        $this->registerArgument('all', 'boolean', 'Load all styles or not.', FALSE, TRUE);
        $this->registerArgument('solid', 'boolean', 'Load solid style or not.');
        $this->registerArgument('regular', 'boolean', 'Load regular style or not.');
        $this->registerArgument('brands', 'boolean', 'Load brands style or not.');
        $this->registerArgument('files', 'array', 'Font Awesome file path.');

        $this->registerArgument('library', 'string', 'Js or css.', FALSE, 'js');
        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);

        $this->registerArgument('disableCdn', 'boolean', 'Disable CDN.');
    }

    public function render() {
        switch ($this->arguments['library']) {
            case 'css':
                $GLOBALS['TSFE']->fe_user->setKey('ses', 'font_awesome.technology', 'css');

                $cdn = $this->getCDN((bool)$this->arguments['files'], $this->arguments['disableCdn']);

                $cdn->loadCss($this->getStyles(), $this->arguments['files']);
            break;
            case 'js':
            default:
                $GLOBALS['TSFE']->fe_user->setKey('ses', 'font_awesome.technology', 'js');

                $cdn = $this->getCDN((bool)$this->arguments['files'], $this->arguments['disableCdn']);

                $cdn->loadJs($this->getStyles(), $this->arguments['files'], $this->arguments['footer']);
        }
    }

    /**
     * @param bool $isCustomized
     * @param bool $disableCdn
     *
     * @return \Dagou\FontAwesome\Interfaces\CDN
     */
    protected function getCDN(bool $isCustomized, bool $disableCdn): CDN {
        if ($isCustomized) {
            return GeneralUtility::makeInstance(Customization::class);
        }

        if (!$disableCdn && ($className = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN']) && is_subclass_of($className, CDN::class)) {
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