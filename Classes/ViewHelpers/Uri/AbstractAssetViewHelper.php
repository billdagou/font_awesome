<?php
namespace Dagou\FontAwesome\ViewHelpers\Uri;

use Dagou\FontAwesome\Source\Local;
use Dagou\FontAwesome\Source\SourceInterface;
use Dagou\FontAwesome\Traits\ServerRequest;
use Dagou\FontAwesome\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

abstract class AbstractAssetViewHelper extends AbstractViewHelper {
    use ServerRequest;

    /**
     * @return void
     */
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('pack', 'string', 'A group of one or more icon families that share a cohesive visual personality.', FALSE, 'all');
        $this->registerArgument('family', 'string', 'A group of related icon styles that share the same basic design but vary in weight/style.', FALSE, '');
        $this->registerArgument('style', 'string', 'A consistent and specific visual weight.', FALSE, 'solid');
        $this->registerArgument('forceLocal', 'boolean', 'Force to use local source.');
    }

    /**
     * @return \Dagou\FontAwesome\Source\SourceInterface
     */
    protected function getSource(): SourceInterface {
        if ($this->arguments['forceLocal'] !== TRUE
            && is_subclass_of(($className = ExtensionUtility::getSource()), SourceInterface::class)
        ) {
            return GeneralUtility::makeInstance($className);
        } else {
            return GeneralUtility::makeInstance(Local::class);
        }
    }
}