<?php
namespace Dagou\FontAwesome\ViewHelpers\Mask;

use Dagou\FontAwesome\Traits\Style\Regular;

final class ChiselViewHelper extends AbstractMaskIconViewHelper {
    use Regular;

    protected array $families = [];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-chisel';
    }
}