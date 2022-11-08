<?php
namespace Dagou\FontAwesome\ViewHelpers\Mask;

use Dagou\FontAwesome\Traits\Icon;
use Dagou\FontAwesome\Traits\Processor;
use Dagou\FontAwesome\Traits\Style;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class AbstractIconViewHelper extends AbstractViewHelper {
    use Icon, Processor, Style;

    public function initializeArguments() {
        $this->registerArgument('sharp', 'boolean', 'Sharp icon or not');
        $this->registerArgument('icon', 'string', 'Mask icon name', TRUE);
        $this->registerArgument('id', 'string', 'Mask ID');
    }

    /**
     * @return string
     */
    public function render(): string {
        $classes = [];
        $data = [];

        $this->process($classes, $data, 'style', 'icon');

        $this->viewHelperVariableContainer->add(static::class, 'mask', $classes);
        $this->viewHelperVariableContainer->add(static::class, 'maskId', $this->arguments['id']);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(self::class, 'maskId');
        $this->viewHelperVariableContainer->remove(self::class, 'mask');

        return $content;
    }
}