<?php
namespace Dagou\FontAwesome\Traits;

trait Rotate {
    /**
     * @param string $rotate
     *
     * @return bool
     */
    protected function isValidRotate(string $rotate): bool {
        if ($GLOBALS['TSFE']->fe_user->getKey('ses', 'font_awesome.technology') === 'js') {
            return is_numeric($rotate);
        }

        return in_array($rotate, [
            '90',
            '180',
            '270',
        ]);
    }
}