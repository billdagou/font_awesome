<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/style/pull
 */
trait Border {
    /**
     * @return void
     */
    protected function registerBorderArguments(): void {
        $this->registerArgument('border', 'boolean', 'Icon border');
    }

    /**
     * @return void
     */
    protected function processBorder(): void {
        if ($this->arguments['border'] === TRUE) {
            $this->classes[] = 'fa-border';
        }
    }
}