<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\ViewHelpers\StackViewHelper;

/**
 * @see https://docs.fontawesome.com/web/style/stack
 */
trait Stack {
    /**
     * @return void
     */
    protected function registerStackArguments(): void {
        $this->registerArgument('large', 'boolean', 'Stack larger icon');
    }

    /**
     * @return void
     */
    protected function processStack(): void {
        if ($this->viewHelperVariableContainer->get(StackViewHelper::class, 'isStack')) {
            if ($this->arguments['large']) {
                $this->classes[] = 'fa-stack-2x';
            } else {
                $this->classes[] = 'fa-stack-1x';
            }
        }
    }
}