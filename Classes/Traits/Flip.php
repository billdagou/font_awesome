<?php
namespace Dagou\FontAwesome\Traits;

trait Flip {
    /**
     * @var array
     */
    protected $flips = [
        'both',
        'horizontal',
        'vertical',
    ];

    /**
     * @param array $classes
     * @param array $data
     */
    protected function flip(array &$classes, array &$data) {
        if (in_array($this->arguments['flip'], $this->flips)) {
            $classes[] = 'fa-flip-'.$this->arguments['flip'];
        }
    }
}