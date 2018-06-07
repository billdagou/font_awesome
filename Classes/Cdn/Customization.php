<?php
namespace Dagou\FontAwesome\Cdn;

use Dagou\FontAwesome\Traits\Asset;

class Customization extends AbstractCdn {
    use Asset;

    /**
     * @param array $packages
     * @param string $library
     * @param bool $footer
     */
    public function load(array $packages = [], string $library = 'js', bool $footer = TRUE) {
        if (count($packages)) {
            foreach ($packages as $package) {
                $this->loadPackage($package, $library, $footer);
            }
        }
    }

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getCss(string $package) {
        return $this->getAssetPath($package);
    }

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getJs(string $package) {
        return $this->getAssetPath($package);
    }
}