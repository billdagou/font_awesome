<?php
namespace Dagou\FontAwesome\ViewHelpers\Uri;

use Dagou\FontAwesome\Interfaces\Framework;
use Dagou\FontAwesome\Interfaces\Source;
use Dagou\FontAwesome\Source\Local;
use Dagou\FontAwesome\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class CssViewHelper extends AbstractViewHelper {
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('package', 'string', 'FontAwesome package to load.', FALSE, 'all');
        $this->registerArgument('forceLocal', 'boolean', 'Force to use local source.');
    }

    /**
     * @return string
     */
    public function render(): string {
        $GLOBALS['TSFE']->fe_user->setKey('ses', Framework::NAME, Framework::CSS);

        if ($this->arguments['forceLocal'] !== TRUE
            && is_subclass_of(($className = ExtensionUtility::getSource()), Source::class)
        ) {
            $source = GeneralUtility::makeInstance($className);
        } else {
            $source = GeneralUtility::makeInstance(Local::class);
        }

        return $source->getCss($this->arguments['package']);
    }
}