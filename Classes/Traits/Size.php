<?php
namespace Dagou\FontAwesome\Traits;

trait Size {
    /**
     * @var array
     */
    protected $sizes = [
        '2xs',
        'xs',
        'sm',
        'lg',
        'xl',
        '2xl',
        '1x',
        '2x',
        '3x',
        '4x',
        '5x',
        '6x',
        '7x',
        '8x',
        '9x',
        '10x',
    ];

    /**
     * @param array $classes
     * @param array $data
     */
    protected function size(array &$classes, array &$data) {
        if (in_array($this->arguments['size'], $this->sizes)) {
            $classes[] = 'fa-'.$this->arguments['size'];
        }
    }
}