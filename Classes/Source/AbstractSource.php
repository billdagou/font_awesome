<?php
namespace Dagou\FontAwesome\Source;

use Dagou\FontAwesome\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    protected const URL = '';
    protected const VERSION = '6.7.2';

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
            case 'thin':
                return 'thin.min.css';
            case 'duotone':
                return 'duotone.min.css';
            case 'fontawesome':
                return 'fontawesome.min.css';

            case 'svg':
                return 'svg-with-js.min.css';
            case 'v4-font':
                return 'v4-font-face.min.css';
            case 'v4-shims':
                return 'v4-shims.min.css';
            case 'v5-font':
                return 'v5-font-face.min.css';
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
            case 'thin':
                return 'thin.min.js';
            case 'duotone':
                return 'duotone.min.js';
            case 'fontawesome':
                return 'fontawesome.min.js';

            case 'conflict':
                return 'conflict-detection.min.js';
            case 'v4-shims':
                return 'v4-shims.min.js';
        }
    }
}