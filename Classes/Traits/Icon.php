<?php
namespace Dagou\FontAwesome\Traits;

trait Icon {
    /**
     * @param array $classes
     * @param array $data
     */
    protected function icon(array &$classes, array &$data) {
        $classes[] = 'fa-'.$this->arguments['icon'];
    }
}