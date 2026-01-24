<?php
namespace Dagou\FontAwesome\Traits;

trait Inverse {
    /**
     * @return void
     */
    protected function registerInverseArguments(): void {
        $this->registerArgument('inverse', 'boolean', 'Inverse color');
    }

    /**
     * @return void
     */
    protected function processInverse(): void {
        if ($this->arguments['inverse'] === TRUE) {
            $this->classes[] = 'fa-inverse';
        }
    }
}