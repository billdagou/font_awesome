<?php
namespace Dagou\FontAwesome\Cdn;

use Dagou\FontAwesome\Traits\Asset;

class Customization extends AbstractCdn {
    use Asset;

    public function load(array $packages = [], string $type = 'js', bool $footer = TRUE) {
        if (count($packages)) {
            foreach ($packages as $package) {
                $this->loadPackage($package, $type, $footer);
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