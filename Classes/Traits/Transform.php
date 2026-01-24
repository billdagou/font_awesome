<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\Type\Framework;

/**
 * @see https://docs.fontawesome.com/web/style/power-transform
 */
trait Transform {
    use Flip, Rotate;

    /**
     * @return void
     */
    protected function registerTransformArguments(): void {
        $this->registerArgument('grow', 'int', 'Scale up', FALSE, 0);
        $this->registerArgument('shrink', 'int', 'Scale down', FALSE, 0);

        $this->registerArgument('up', 'int', 'Move up', FALSE, 0);
        $this->registerArgument('right', 'int', 'Move right', FALSE, 0);
        $this->registerArgument('down', 'int', 'Move down', FALSE, 0);
        $this->registerArgument('left', 'int', 'Move left', FALSE, 0);

        $this->registerRotateArguments();
        $this->registerFlipArguments();
    }

    /**
     * @return void
     */
    protected function processTransform(): void {
        if ($this->framework === Framework::JS) {
            $transform = [];

            if ($this->arguments['grow'] !== $this->arguments['shrink']) {
                $transform[] = ($this->arguments['grow'] > $this->arguments['shrink'] ? 'grow' : 'shrink')
                    .'-'.abs($this->arguments['grow'] - $this->arguments['shrink']);
            }

            if ($this->arguments['up'] !== $this->arguments['down']) {
                $transform[] = ($this->arguments['up'] > $this->arguments['down'] ? 'up' : 'down')
                    .'-'.abs($this->arguments['up'] - $this->arguments['down']);
            }

            if ($this->arguments['left'] !== $this->arguments['right']) {
                $transform[] = ($this->arguments['left'] > $this->arguments['right'] ? 'left' : 'right')
                    .'-'.abs($this->arguments['left'] - $this->arguments['right']);
            }

            if ($this->arguments['rotate'] && is_numeric($this->arguments['rotate'])) {
                $transform[] = 'rotate-'.$this->arguments['rotate'];
            }

            if (in_array($this->arguments['flip'], $this->flips)) {
                $transform[] = match ($this->arguments['flip']) {
                    'h', 'horizontal' => 'flip-h',
                    'v', 'vertical' => 'flip-v',
                    'b', 'both' => 'flip-v flip-h',
                };
            }

            if (count($transform)) {
                $this->data['fa-transform'] = implode(' ', $transform);
            }
        }
    }
}