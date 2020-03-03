<?php
namespace Dagou\FontAwesome\Traits;

trait Size {
    /**
     * @param string $size
     *
     * @return bool
     */
    protected function isValidSize(string $size): bool {
        return in_array($size, [
            'xs',
            'sm',
            'lg',
            '2x',
            '3x',
            '4x',
            '5x',
            '6x',
            '7x',
            '8x',
            '9x',
            '10x',
        ]);
    }
}