<?php
namespace Dagou\FontAwesome\Cdn;

use Dagou\FontAwesome\Traits\Asset;

class Local extends AbstractCdn {
    use Asset;
    const URL = 'EXT:font_awesome/Resources/Public/';

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getCss(string $package) {
        switch ($package) {
            case 'all':
                $css = self::URL.'css/all.min.css';
            break;
            case 'fontawesome':
                $css = self::URL.'css/fontawesome.min.css';
            break;
            default:
                $css = self::URL.'css/'.$package.'.min.css';
        }

        return $this->getAssetPath($css);
    }

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getJs(string $package) {
        switch ($package) {
            case 'all':
                $js = self::URL.'js/all.min.js';
            break;
            case 'fontawesome':
                $js = self::URL.'js/fontawesome.min.js';
            break;
            default:
                $js = self::URL.'js/'.$package.'.min.js';
        }

        return $this->getAssetPath($js);
    }
}