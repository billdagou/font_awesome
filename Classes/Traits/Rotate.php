<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\Interfaces\Framework;
use Dagou\FontAwesome\Registry\FontAwesome;
use TYPO3\CMS\Core\Utility\GeneralUtility;

trait Rotate {
    /**
     * @param string $rotate
     *
     * @return bool
     */
    protected function isValidRotate(string $rotate): bool {
        if (GeneralUtility::makeInstance(FontAwesome::class)->get(Framework::FRAMEWORK_JS)) {
            return is_numeric($rotate);
        }

        return in_array($rotate, [
            '90',
            '180',
            '270',
        ]);
    }
}