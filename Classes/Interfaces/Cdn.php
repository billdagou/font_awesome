<?php
namespace Dagou\FontAwesome\Interfaces;

interface Cdn {
    const VERSION = '5.6.3';

    /**
     * @param array $packages
     * @param string $library
     * @param bool $footer
     */
    public function load(array $packages = [], string $library = 'js', bool $footer = TRUE);
}