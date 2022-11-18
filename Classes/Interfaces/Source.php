<?php
namespace Dagou\FontAwesome\Interfaces;

interface Source {
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