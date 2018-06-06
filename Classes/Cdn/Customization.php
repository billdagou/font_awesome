<?php
namespace Dagou\FontAwesome\Cdn;

use Dagou\FontAwesome\Traits\Asset;

class Customization extends AbstractCdn {
    use Asset;

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