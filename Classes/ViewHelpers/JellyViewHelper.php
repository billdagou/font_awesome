<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Style\Regular;

final class JellyViewHelper extends AbstractIconViewHelper {
    use Regular;

    protected array $families = [
        'fill',
        'duo',
    ];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-jelly'
            .(in_array($this->arguments['family'], $this->families) ? '-'.$this->arguments['family'] : '');
    }
}