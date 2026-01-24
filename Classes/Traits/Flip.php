<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\Type\Framework;

/**
 * @see https://docs.fontawesome.com/web/style/rotate
 */
trait Flip {
    protected array $flips = [
        'h',
        'horizontal',
        'v',
        'vertical',
        'b',
        'both',
    ];

    /**
     * @return void
     */
    protected function registerFlipArguments(): void {
        $this->registerArgument('flip', 'string', 'Flip icon');
    }

    /**
     * @return void
     */
    protected function processFlip(): void {
        if (in_array($this->arguments['flip'], $this->flips) && $this->framework === Framework::CSS) {
            match ($this->arguments['flip']) {
                'h', 'horizontal' => $this->classes[] = 'fa-flip-horizontal',
                'v', 'vertical' => $this->classes[] = 'fa-flip-vertical',
                'b', 'both' => $this->classes[] = 'fa-flip-both',
            };
        }
    }
}