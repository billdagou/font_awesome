<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\Interfaces\Framework;

trait Flip {
    protected array $flips = [
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