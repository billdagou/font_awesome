<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/style/pull
 */
trait Pull {
    protected array $pulls = [
        'start',
        'end',
    ];

    /**
     * @return void
     */
    protected function registerPullArguments(): void {
        $this->registerArgument('pull', 'string', 'Pulled icon');
    }

    /**
     * @return void
     */
    protected function processPull(): void {
        if (in_array($this->arguments['pull'], $this->pulls)) {
            $this->classes[] = 'fa-pull-'.$this->arguments['pull'];
        }
    }
}