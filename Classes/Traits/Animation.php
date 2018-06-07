<?php
namespace Dagou\FontAwesome\Traits;

trait Animation {
    /**
     * @var array
     */
    protected static $animations = [
        'spin',
        'pulse',
    ];

    /**
     * @param string $animation
     *
     * @return bool
     */
    protected function isValidAnimation(string $animation) {
        return in_array($animation, self::$animations);
    }
}