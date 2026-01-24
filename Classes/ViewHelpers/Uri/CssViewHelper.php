<?php
namespace Dagou\FontAwesome\ViewHelpers\Uri;

use Dagou\FontAwesome\Context\FrameworkContext;
use Dagou\FontAwesome\Type\Framework;
use TYPO3\CMS\Core\Utility\GeneralUtility;

final class CssViewHelper extends AbstractAssetViewHelper {
    /**
     * @return string
     */
    public function render(): string {
        GeneralUtility::makeInstance(FrameworkContext::class, $this->getRequest())
            ->set(Framework::CSS);

        return $this->getSource()->getCss($this->arguments['pack'], $this->arguments['family'], $this->arguments['style']);
    }
}