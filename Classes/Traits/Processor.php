<?php
namespace Dagou\FontAwesome\Traits;

trait Processor {
    /**
     * @param array $classes
     * @param array $data
     * @param string ...$styles
     */
    protected function process(array &$classes, array &$data, string ...$styles) {
        foreach ($styles as $style) {
            $this->$style($classes, $data);
        }
    }
}