<?php
namespace Dagou\FontAwesome\Traits;

trait Inverse {
    /**
     * @param array $classes
     * @param array $data
     */
    protected function inverse(array &$classes, array &$data) {
        if ($this->arguments['inverse']) {
            $classes[] = 'fa-inverse';
        }
    }
}