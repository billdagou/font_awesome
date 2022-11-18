<?php
namespace Dagou\FontAwesome\Traits;

trait Style {
    protected array $styles = [
        'brands',
        'duotone',
        'light',
        'regular',
        'solid',
        'thin',
    ];

    /**
     * @param array $classes
     * @param array $data
     */
    protected function style(array &$classes, array &$data) {
        if ($this->arguments['sharp']) {
            $classes[] = 'fa-sharp';
        }

        if (in_array($this->style, $this->styles)) {
            $classes[] = 'fa-'.$this->style;
        }
    }
}