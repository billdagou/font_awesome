<?php
namespace Dagou\FontAwesome\ViewHelpers\Mask;

use Dagou\FontAwesome\Traits\Style\Semibold;

final class WhiteboardViewHelper extends AbstractMaskIconViewHelper {
    use Semibold;

    protected array $families = [];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-whiteboard';
    }
}