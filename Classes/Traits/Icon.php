<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/style/basics
 */
trait Icon {
    /**
     * @return void
     */
    protected function registerIconArguments(): void {
        $this->registerArgument('icon', 'string', 'Icon name', TRUE);
    }

    /**
     * @return void
     */
    protected function processIcon(): void {
        $this->classes[] = 'fa-'.$this->arguments['icon'];
    }
}