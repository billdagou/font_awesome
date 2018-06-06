<?php
namespace Dagou\FontAwesome\Interfaces;

interface Cdn {
    const VERSION = '5.0.13';

    /**
     * @param array $packages
     * @param string $type
     * @param bool $footer
     */
    public function load(array $packages = [], string $type = 'js', bool $footer = TRUE);
}