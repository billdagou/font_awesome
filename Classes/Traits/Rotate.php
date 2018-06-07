<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\ViewHelpers\LoadViewHelper;

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
        if ($this->viewHelperVariableContainer->get(LoadViewHelper::class, 'library') === 'js') {
            return is_numeric($rotate);
        }

        return in_array($rotate, self::$rotates);
    }
}