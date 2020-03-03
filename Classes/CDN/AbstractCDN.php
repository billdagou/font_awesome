<?php
namespace Dagou\FontAwesome\CDN;

use Dagou\FontAwesome\Interfaces\CDN;
use Dagou\FontAwesome\Traits\PageRenderer;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractCDN implements CDN, SingletonInterface {
    use PageRenderer;
    const URL = '';

    /**
     * @param array $styles
     * @param array|NULL $css
     */
    public function loadCss(array $styles, array $css = NULL) {
        foreach ($styles as $style) {
            $styleCss = $this->renderCss($style, $css);

            $this->getPageRenderer()->addCssLibrary($styleCss);
        }
    }

    /**
     * @param string $style
     * @param array|NULL $css
     *
     * @return string
     */
    protected function renderCss(string $style, array $css = NULL): string {
        return static::URL.'css/'.$this->getCssBuild($style);
    }

    /**
     * @param string $style
     *
     * @return string
     */
    protected function getCssBuild(string $style): string {
        switch ($style) {
            case 'all':
                return 'all.min.css';
            case 'solid':
                return 'solid.min.css';
            case 'regular':
                return 'regular.min.css';
            case 'brands':
                return 'brands.min.css';
            case 'fontawesome':
                return 'fontawesome.min.css';
        }
    }

    /**
     * @param array $styles
     * @param array|NULL $js
     * @param bool $footer
     */
    public function loadJs(array $styles, array $js = NULL, bool $footer = TRUE) {
        if ($footer) {
            foreach ($styles as $style) {
                $styleJs = $this->renderJs($style, $js);

                $this->getPageRenderer()->addJsFooterLibrary('font_awesome-'.$style, $styleJs);
            }
        } else {
            foreach ($styles as $style) {
                $styleJs = $this->renderJs($style, $js);

                $this->getPageRenderer()->addJsLibrary('font_awesome-'.$style, $styleJs);
            }
        }
    }

    /**
     * @param string $style
     * @param array|NULL $js
     *
     * @return string
     */
    protected function renderJs(string $style, array $js = NULL): string {
        return static::URL.'js/'.$this->getJsBuild($style);
    }

    /**
     * @param string $style
     *
     * @return string
     */
    protected function getJsBuild(string $style): string {
        switch ($style) {
            case 'all':
                return 'all.min.js';
            case 'solid':
                return 'solid.min.js';
            case 'regular':
                return 'regular.min.js';
            case 'brands':
                return 'brands.min.js';
            case 'fontawesome':
                return 'fontawesome.min.js';
        }
    }
}