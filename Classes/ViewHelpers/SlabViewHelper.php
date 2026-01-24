<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Style\Solid;

final class SlabViewHelper extends AbstractIconViewHelper {
    use Solid;

    protected array $families = [
        'press',
    ];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-slab'
            .(in_array($this->arguments['family'], $this->families) ? '-'.$this->arguments['family'] : '');
    }
}