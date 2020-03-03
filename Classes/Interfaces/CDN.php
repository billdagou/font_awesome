<?php
namespace Dagou\FontAwesome\Interfaces;

interface CDN {
    const VERSION = '5.12.1';

    /**
     * @param array $packages
     * @param array|NULL $css
     */
    public function loadCss(array $packages, array $css = NULL);

    /**
     * @param array $packages
     * @param array|NULL $js
     * @param bool $footer
     */
    public function loadJs(array $packages, array $js = NULL, bool $footer = TRUE);
}