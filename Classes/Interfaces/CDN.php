<?php
namespace Dagou\FontAwesome\Interfaces;

interface CDN {
    const VERSION = '5.12.1';

    /**
     * @param array $styles
     * @param array|NULL $css
     */
    public function loadCss(array $styles, array $css = NULL);

    /**
     * @param array $styles
     * @param array|NULL $js
     * @param bool $footer
     */
    public function loadJs(array $styles, array $js = NULL, bool $footer = TRUE);
}