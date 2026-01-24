<?php
namespace Dagou\FontAwesome\Traits;

/**
 * @see https://docs.fontawesome.com/web/add-icons/how-to
 */
trait Style {
    /**
     * @return void
     */
    protected function processStyle(): void {
        $this->classes[] = 'fa-'.$this->style;
    }
}