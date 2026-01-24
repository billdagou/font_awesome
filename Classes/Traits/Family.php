<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/add-icons/how-to
 */
trait Family {
    /**
     * @return void
     */
    protected function registerFamilyArguments(): void {
        $this->registerArgument('family', 'string', 'Family name');
    }

    /**
     * @return void
     */
    protected function processFamily(): void {
        if (in_array($this->arguments['family'], $this->families)) {
            $this->classes[] = 'fa-'.$this->arguments['family'];
        }
    }
}