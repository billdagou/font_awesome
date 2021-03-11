<?php
namespace Dagou\FontAwesome\Interfaces;

interface Source {
    const VERSION = '5.15.2';

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