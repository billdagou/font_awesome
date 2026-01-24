<?php
namespace Dagou\FontAwesome\ViewHelpers\Mask;

use Dagou\FontAwesome\Traits\Style\Light;

final class ThumbprintViewHelper extends AbstractMaskIconViewHelper {
    use Light;

    protected array $families = [];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-thumbprint';
    }
}