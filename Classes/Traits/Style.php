<?php
namespace Dagou\FontAwesome\Traits;

trait Style {
    /**
     * @var array
     */
    protected static $styles = [
        'solid' => 'fas',
        'regular' => 'far',
        'light' => 'fal',
        'brand' => 'fab',
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
        return in_array($style, array_keys(self::$styles));
    }
}