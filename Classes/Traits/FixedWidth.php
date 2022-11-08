<?php
namespace Dagou\FontAwesome\Traits;

trait FixedWidth {
    /**
     * @param array $classes
     * @param array $data
     */
    protected function fixedWidth(array &$classes, array &$data) {
        if ($this->arguments['fixedWidth']) {
            $classes[] = 'fa-fw';
        }
    }
}