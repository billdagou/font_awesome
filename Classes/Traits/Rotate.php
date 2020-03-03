<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\ViewHelpers\AbstractLoadViewHelper;

trait Rotate {
    /**
     * @param string $rotate
     *
     * @return bool
     */
    protected function isValidRotate(string $rotate): bool {
        if ($this->viewHelperVariableContainer->get(AbstractLoadViewHelper::class, 'technology') === 'js') {
            return is_numeric($rotate);
        }

        return in_array($rotate, [
            '90',
            '180',
            '270',
        ]);
    }
}