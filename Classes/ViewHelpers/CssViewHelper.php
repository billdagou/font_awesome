<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Interfaces\Framework;
use Dagou\FontAwesome\Interfaces\Source;
use Dagou\FontAwesome\Registry\FontAwesome;
use Dagou\FontAwesome\Source\Local;
use Dagou\FontAwesome\Traits\Package;
use Dagou\FontAwesome\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class CssViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Asset\CssViewHelper {
    use Package;

    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('package', 'string', 'FontAwesome package to load.', FALSE, 'all');
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.', FALSE, FALSE);
        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your CSS once, even though it is added multiple times.',
            FALSE,
            'font_awesome'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if ($this->isValidPackage($this->arguments['package'])) {
            if (!$this->arguments['href']) {
                if (!$this->arguments['disableSource']
                    && ($className = ExtensionUtility::getSource())
                    && is_subclass_of($className, Source::class)
                ) {
                    $source = GeneralUtility::makeInstance($className);
                } else {
                    $source = GeneralUtility::makeInstance(Local::class);
                }

                $this->tag->addAttribute('href', $source->getCss($this->arguments['package']));
            }

            $this->arguments['identifier'] .= '.'.$this->arguments['package'];

            GeneralUtility::makeInstance(FontAwesome::class)->set(Framework::FRAMEWORK_CSS, TRUE);

            return parent::render();
        }

        return '';
    }
}