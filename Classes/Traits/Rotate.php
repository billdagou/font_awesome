<?php
namespace Dagou\FontAwesome\Traits;

trait Rotate {
    /**
     * @var array
     */
    protected $rotates = [
        '90',
        '180',
        '270',
    ];

    /**
     * @param array $classes
     * @param array $data
     */
    protected function rotate(array &$classes, array &$data) {
        if (in_array($this->arguments['rotate'], $this->rotates)) {
            $classes[] = 'fa-rotate-'.$this->arguments['rotate'];
        }
    }
}