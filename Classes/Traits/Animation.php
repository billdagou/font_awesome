<?php
namespace Dagou\FontAwesome\Traits;

trait Animation {
    /**
     * @param string $animation
     *
     * @return bool
     */
    protected function isValidAnimation(string $animation): bool {
        return in_array($animation, [
            'spin',
            'pulse',
        ]);
    }
}