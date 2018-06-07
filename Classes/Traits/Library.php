<?php
namespace Dagou\FontAwesome\Traits;

trait Library {
    /**
     * @var array
     */
    protected static $types = [
        'js',
        'css',
    ];
    /**
     * @var string
     */
    protected $defaultType = 'js';

    /**
     * @param string $type
     *
     * @return bool
     */
    protected function isValidType(string $type) {
        return in_array($type, self::$types);
    }
}