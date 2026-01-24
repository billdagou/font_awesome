<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/style/icon-canvas
 */
trait Width {
    protected array $widths = [
        'fixed',
        'auto',
        'automatic',
    ];

    /**
     * @return void
     */
    protected function registerWidthArguments(): void {
        $this->registerArgument('width', 'string', 'Icon width');
    }

    /**
     * @return void
     */
    protected function processWidth(): void {
        if (in_array($this->arguments['width'], $this->widths)) {
            match ($this->arguments['width']) {
                'fixed' => '',
                'auto', 'automatic' => $this->classes[] = 'fa-width-auto',
            };
        }
    }
}