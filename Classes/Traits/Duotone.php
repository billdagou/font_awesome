<?php
namespace Dagou\FontAwesome\Traits;

trait Duotone {
    /**
     * @return void
     */
    protected function registerDuotoneArguments(): void {
        $this->registerArgument('swap', 'boolean', 'Swap the default opacity');
    }

    /**
     * @return void
     */
    protected function processDuotone(): void {
        if ($this->arguments['swap'] === TRUE && in_array($this->arguments['family'], ['duotone', 'sharp-duotone'])) {
            $this->classes[] = 'fa-swap-opacity';
        }
    }
}