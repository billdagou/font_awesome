<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Style\Semibold;

final class WhiteboardViewHelper extends AbstractIconViewHelper {
    use Semibold;

    protected array $families = [];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-whiteboard';
    }
}