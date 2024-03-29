<?php
namespace Dagou\FontAwesome\Traits;

trait Pull {
    protected array $pulls = [
        'left',
        'right',
    ];

    /**
     * @param array $classes
     * @param array $data
     */
    protected function pull(array &$classes, array &$data) {
        if (in_array($this->arguments['pull'], $this->pulls)) {
            $classes[] = 'fa-pull-'.$this->arguments['pull'];
        }
    }
}