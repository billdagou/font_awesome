<?php
namespace Dagou\FontAwesome\CDN;

use Dagou\FontAwesome\Traits\Asset;

class Customization extends AbstractCDN {
    use Asset;

    /**
     * @param string $style
     * @param array|NULL $css
     *
     * @return string
     */
    protected function renderCss(string $style, array $css = NULL):string {
        return $this->getAssetPath($css[$style]);
    }

    /**
     * @param string $style
     * @param array|NULL $js
     *
     * @return string
     */
    protected function renderJs(string $style, array $js = NULL):string {
        return $this->getAssetPath($js[$style]);
    }
}