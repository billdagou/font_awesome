<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Cdn\Customization;
use Dagou\FontAwesome\Cdn\Local;
use Dagou\FontAwesome\Interfaces\Cdn;
use Dagou\FontAwesome\Traits\ExtConf;
use Dagou\FontAwesome\Traits\Library;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class LoadViewHelper extends AbstractViewHelper {
    use ExtConf, Library;

    public function initializeArguments() {
        $this->registerArgument('all', 'boolean', 'Load all packages or not.', FALSE, TRUE);
        $this->registerArgument('solid', 'boolean', 'Load solid package or not.');
        $this->registerArgument('regular', 'boolean', 'Load regular package or not.');
        $this->registerArgument('brands', 'boolean', 'Load brands package or not.');
        $this->registerArgument('library', 'string', 'Library type.', FALSE, 'js');
        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
        $this->registerArgument('packages', 'array', 'Font Awesome packages.');
    }

    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext) {
        if (!self::isValidLibrary($arguments['library'])) {
            $arguments['library'] = self::$defaultLibrary;
        }

        $renderingContext->getVariableProvider()->add(LoadViewHelper::class, 'library', $arguments['library']);

        if (is_array($arguments['packages'])) {
            $cdn = self::getCdn(TRUE);

            $cdn->load($arguments['packages'], $arguments['library'], $arguments['footer']);
        } else {
            $cdn = self::getCdn(FALSE);

            $packages = [];
            if ($arguments['all']) {
                $packages[] = 'all';
            }
            if ($arguments['solid']) {
                $packages[] = 'solid';
            }
            if ($arguments['regular']) {
                $packages[] = 'regular';
            }
            if ($arguments['brands']) {
                $packages[] = 'brands';
            }

            $cdn->load($packages, $arguments['library'], $arguments['footer']);
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