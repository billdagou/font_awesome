<?php
namespace Dagou\FontAwesome\Interfaces;

interface Source {
    const VERSION = '6.2.0';

    /**
     * @param string $package
     *
     * @return string
     */
    public function getCss(string $package): string;

    /**
     * @param string $package
     *
     * @return string
     */
    public function getJs(string $package): string;
}