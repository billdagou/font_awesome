<?php
namespace Dagou\FontAwesome\Traits;

trait Size {
    /**
     * @var array
     */
    protected static $sizes = [
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
    ];

    /**
     * @param string $size
     *
     * @return bool
     */
    protected function isValidSize(string $size) {
        return in_array($size, self::$sizes);
    }
}