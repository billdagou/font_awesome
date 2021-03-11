<?php
namespace Dagou\FontAwesome\Traits;

trait MaskStyle {
    /**
     * @var array
     */
    protected $maskStyles = [
        'solid' => 'fas',
        'regular' => 'far',
        'light' => 'fal',
        'brand' => 'fab',
    ];
    /**
     * @var string
     */
    protected $defaultMaskStyle = 'solid';

    /**
     * @param string $maskStyle
     *
     * @return bool
     */
    protected function isValidMaskStyle(string $maskStyle): bool {
        return in_array($maskStyle, array_keys($this->maskStyles));
    }
}