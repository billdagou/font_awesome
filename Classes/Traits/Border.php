<?php
namespace Dagou\FontAwesome\Traits;

trait Border {
    /**
     * @param array $classes
     * @param array $data
     */
    protected function border(array &$classes, array &$data) {
        if ($this->arguments['border']) {
            $classes[] = 'fa-border';
        }
    }
}