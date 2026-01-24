<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/style/size
 */
trait Size {
    protected array $sizes = [
        '2xs',
        'xs',
        'sm',
        'lg',
        'xl',
        '2xl',
        '1x',
        '2x',
        '3x',
        '4x',
        '5x',
        '6x',
        '7x',
        '8x',
        '9x',
        '10x',
    ];

    /**
     * @return void
     */
    protected function registerSizeArguments(): void {
        $this->registerArgument('size', 'string', 'Icon size');
    }

    /**
     * @return void
     */
    protected function processSize(): void {
        if (in_array($this->arguments['size'], $this->sizes)) {
            $this->classes[] = 'fa-'.$this->arguments['size'];
        }
    }
}