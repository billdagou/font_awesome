<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\ViewHelpers\StackViewHelper;

trait Stack {
    /**
     * @param array $classes
     * @param array $data
     */
    protected function stack(array &$classes, array &$data) {
        if ($this->viewHelperVariableContainer->get(StackViewHelper::class, 'isStack')) {
            if ($this->arguments['large']) {
                $classes[] = 'fa-stack-2x';
            } else {
                $classes[] = 'fa-stack-1x';
            }
        }
    }
}