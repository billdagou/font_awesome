<?php
namespace Dagou\FontAwesome\Traits\Layer;

trait Position {
    protected array $positions = [
        'bottom-left',
        'bottom-right',
        'top-left',
        'top-right',
    ];

    /**
     * @return void
     */
    protected function registerPositionArguments(): void {
        $this->registerArgument('position', 'string', 'Counter position');
    }

    /**
     * @return void
     */
    protected function processPosition(): void {
        if (in_array($this->arguments['position'], $this->positions)) {
            match ($this->arguments['position']) {
                'top-right' => '',
                default => $this->classes[] = 'fa-layers-'.$this->arguments['position'],
            };
        }
    }
}