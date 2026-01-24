<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\Type\Framework;

/**
 * @see https://docs.fontawesome.com/web/style/rotate
 */
trait Rotate {
    protected array $rotates = [
        '90',
        '180',
        '270',
    ];

    /**
     * @return void
     */
    protected function registerRotateArguments(): void {
        $this->registerArgument('rotate', 'string', 'Rotate icon');
    }

    /**
     * @return void
     */
    protected function processRotate(): void {
        if ($this->arguments['rotate'] && $this->framework === Framework::CSS) {
            if (in_array($this->arguments['rotate'], $this->rotates)) {
                $this->classes[] = 'fa-rotate-'.$this->arguments['rotate'];
            } elseif (is_numeric($this->arguments['rotate'])) {
                $this->classes[] = 'fa-rotate-by';
                $this->styles['--fa-rotate-angle'] = $this->arguments['rotate'].'deg';
            }
        }
    }
}