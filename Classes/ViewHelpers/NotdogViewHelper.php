<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Style\Solid;

final class NotdogViewHelper extends AbstractIconViewHelper {
    use Solid;

    protected array $families = [
        'duo',
    ];

    /**
     * @return void
     */
    protected function processFamily(): void {
        $this->classes[] = 'fa-notdog'
            .(in_array($this->arguments['family'], $this->families) ? '-'.$this->arguments['family'] : '');
    }
}