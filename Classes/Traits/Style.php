<?php
namespace Dagou\FontAwesome\Traits;

trait Style {
    /**
     * @var array
     */
    protected static $styles = [
        'solid',
        'regular',
        'light',
        'brands',
    ];
    /**
     * @var string
     */
    protected $defaultStyle = 'solid';

    /**
     * @param string $style
     *
     * @return bool
     */
    protected function isValidStyle(string $style) {
        return in_array($style, self::$styles);
    }
}