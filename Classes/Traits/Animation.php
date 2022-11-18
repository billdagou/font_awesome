<?php
namespace Dagou\FontAwesome\Traits;

trait Animation {
    protected array $animations = [
        'beat',
        'fade',
        'beat-fade',
        'bounce',
        'flip',
        'shake',
        'spin',
        'spin-pulse',
        'spin-reverse',
    ];

    /**
     * @param array $classes
     * @param array $data
     */
    protected function animation(array &$classes, array &$data) {
        if (in_array($this->arguments['animation'], $this->animations)) {
            if ($this->arguments['animation'] === 'spin-reverse') {
                $classes[] = 'fa-spin-pulse';
            }

            $classes[] = 'fa-'.$this->arguments['animation'];
        }
    }
}