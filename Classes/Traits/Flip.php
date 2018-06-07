<?php
namespace Dagou\FontAwesome\Traits;

trait Flip {
    /**
     * @var array
     */
    protected static $flips = [
        'horizontal',
        'vertical',
    ];

    /**
     * @param string $flip
     *
     * @return bool
     */
    protected function isValidFlip(string $flip) {
        return in_array($flip, self::$flips);
    }
}