<?php
namespace Dagou\FontAwesome\Traits;

trait Pull {
    /**
     * @param string $pull
     *
     * @return bool
     */
    protected function isValidPull(string $pull) {
        return in_array($pull, [
            'left',
            'right',
        ]);
    }
}