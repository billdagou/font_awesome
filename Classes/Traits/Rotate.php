<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\Interfaces\Framework;

trait Rotate {
    protected array $rotates = [
        '90',
        '180',
        '270',
    ];

    /**
     * @param array $classes
     * @param array $data
     */
    protected function rotate(array &$classes, array &$data) {
        if ($GLOBALS['TSFE']->fe_user->getKey('ses', Framework::NAME) === Framework::CSS) {
            if (in_array($this->arguments['rotate'], $this->rotates)) {
                $classes[] = 'fa-rotate-'.$this->arguments['rotate'];
            }
        }
    }
}