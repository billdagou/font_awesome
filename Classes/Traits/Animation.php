<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/style/animate
 */
trait Animation {
    protected array $animations = [
        'beat',
        'fade',
        'beat-fade',
        'bounce',
        'flip',
        'shake',
        'spin',
        'spin-pulse',
    ];

    /**
     * @return void
     */
    protected function registerAnimationArguments(): void {
        $this->registerArgument('animation', 'string', 'Icon animation');
        $this->registerArgument('spin-reverse', 'boolean', 'Spin counter-clockwise');
    }

    /**
     * @return void
     */
    protected function processAnimation(): void {
        if (in_array($this->arguments['animation'], $this->animations)) {
            $this->classes[] = 'fa-'.$this->arguments['animation'];

            if ($this->arguments['spin-reverse'] === TRUE && in_array($this->arguments['animation'], ['spin', 'spin-pulse'])) {
                $this->classes[] = 'fa-spin-reverse';
            }
        }
    }
}