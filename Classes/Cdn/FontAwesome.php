<?php
namespace Dagou\FontAwesome\Cdn;

class FontAwesome extends AbstractCdn {
    const URL = '//use.fontawesome.com/releases/v'.self::VERSION.'/';

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getCss(string $package) {
        return self::URL.'css/'.$package.'.css';
    }

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getJs(string $package) {
        return self::URL.'js/'.$package.'.js';
    }
}