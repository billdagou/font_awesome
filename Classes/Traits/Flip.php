<?php
namespace Dagou\FontAwesome\Traits;

trait Flip {
    /**
     * @var array
     */
    protected static $flips = [
        'h' => 'horizontal',
        'v' => 'vertical',
    ];

    /**
     * @param string $flip
     *
     * @return bool
     */
    protected function isValidFlip(string $flip): bool {
        return in_array($flip, array_keys(self::$flips));
    }
}