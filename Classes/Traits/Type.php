<?php
namespace Dagou\FontAwesome\Traits;

trait Type {
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