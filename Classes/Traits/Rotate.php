<?php
namespace Dagou\FontAwesome\Traits;

trait Rotate {
    /**
     * @var array
     */
    protected static $rotates = [
        '90',
        '180',
        '270',
    ];

    /**
     * @param string $rotate
     *
     * @return bool
     */
    protected function isValidRotate(string $rotate) {
        return in_array($rotate, self::$rotates);
    }
}