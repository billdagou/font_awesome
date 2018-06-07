<?php
namespace Dagou\FontAwesome\Traits;

trait Library {
    /**
     * @var array
     */
    protected static $libraries = [
        'js',
        'css',
    ];
    /**
     * @var string
     */
    protected $defaultLibrary = 'js';

    /**
     * @param string $library
     *
     * @return bool
     */
    protected function isValidLibrary(string $library) {
        return in_array($library, self::$libraries);
    }
}