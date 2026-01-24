<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Style\Light;

final class ThumbprintViewHelper extends AbstractIconViewHelper {
    use Light;

    protected array $families = [];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-thumbprint';
    }
}