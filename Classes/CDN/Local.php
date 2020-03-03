<?php
namespace Dagou\FontAwesome\CDN;

use Dagou\FontAwesome\Traits\Asset;

class Local extends AbstractCDN {
    use Asset;
    const URL = 'EXT:font_awesome/Resources/Public/';

    /**
     * @param string $style
     * @param array|NULL $css
     *
     * @return string
     */
    protected function renderCss(string $style, array $css = NULL):string {
        return $this->getAssetPath(
            self::URL.'css/'.$this->getCssBuild($style)
        );
    }

    /**
     * @param string $style
     * @param array|NULL $js
     *
     * @return string
     */
    protected function renderJs(string $style, array $js = NULL):string {
        return $this->getAssetPath(
            self::URL.'js/'.$this->getJsBuild($style)
        );
    }
}