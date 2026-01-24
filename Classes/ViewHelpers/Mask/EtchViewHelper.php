<?php
namespace Dagou\FontAwesome\ViewHelpers\Mask;

use Dagou\FontAwesome\Traits\Style\Solid;

final class EtchViewHelper extends AbstractMaskIconViewHelper {
    use Solid;

    protected array $families = [];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-etch';
    }
}