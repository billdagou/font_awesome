<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Style\Solid;

final class EtchViewHelper extends AbstractIconViewHelper {
    use Solid;

    protected array $families = [];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-etch';
    }
}