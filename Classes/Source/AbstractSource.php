<?php
namespace Dagou\FontAwesome\Source;

use Dagou\FontAwesome\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    protected const URL = '';
    protected const VERSION = '6.2.1';

    /**
     * @param string $package
     *
     * @return string
     */
    public function getCss(string $package): string {
        return static::URL.'css/'.$this->getCssBuild($package);
    }

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getCssBuild(string $package): string {
        switch ($package) {
            case 'all':
                return 'all.min.css';
            case 'brands':
                return 'brands.min.css';
            case 'solid':
                return 'solid.min.css';
            case 'regular':
                return 'regular.min.css';
            case 'light':
                return 'light.min.css';
            case 'fontawesome':
                return 'fontawesome.min.css';
        }
    }

    /**
     * @param string $package
     *
     * @return string
     */
    public function getJs(string $package): string {
        return static::URL.'js/'.$this->getJsBuild($package);
    }

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getJsBuild(string $package): string {
        switch ($package) {
            case 'all':
                return 'all.min.js';
            case 'brands':
                return 'brands.min.js';
            case 'solid':
                return 'solid.min.js';
            case 'regular':
                return 'regular.min.js';
            case 'light':
                return 'light.min.js';
            case 'fontawesome':
                return 'fontawesome.min.js';
        }
    }
}