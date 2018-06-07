<?php
namespace Dagou\FontAwesome\Traits;

trait Pull {
    /**
     * @var array
     */
    protected static $pulls = [
        'left',
        'right',
    ];

    /**
     * @param string $pull
     *
     * @return bool
     */
    protected function isValidPull(string $pull) {
        return in_array($pull, self::$pulls);
    }
}