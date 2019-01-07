<?php
namespace Dagou\FontAwesome\Cdn;

use Dagou\FontAwesome\Interfaces\Cdn;
use Dagou\FontAwesome\Traits\ExtConf;
use Dagou\FontAwesome\Traits\Package;
use Dagou\FontAwesome\Traits\PageRenderer;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractCdn implements Cdn, SingletonInterface {
    use ExtConf, PageRenderer, Package;

    /**
     * @param array $packages
     * @param string $library
     * @param bool $footer
     */
    public function load(array $packages = [], string $library = 'js', bool $footer = TRUE) {
        print_r($packages);
        if (count($packages)) {
            if (in_array('all', $packages)) {
                $this->loadPackage('all', $library, $footer);
            } else {
                foreach ($packages as $package) {
                    if ($this->isValidPackage($package)) {
print_r($package);
                        $this->loadPackage($package, $library, $footer);
                    }
                }

                $this->loadPackage('fontawesome', $library, $footer);
            }
        }
    }

    /**
     * @param string $package
     * @param string $library
     * @param bool $footer
     */
    protected function loadPackage(string $package, string $library, bool $footer) {
        switch ($library) {
            case 'js':
                if ($footer) {
                    $this->getPageRenderer()->addJsFooterLibrary('font_awesome.'.$package, $this->getJs($package));
                } else {
                    $this->getPageRenderer()->addJsLibrary('font_awesome.'.$package, $this->getJs($package));
                }
            break;
            case 'css':
                $this->getPageRenderer()->addCssLibrary($this->getCss($package));
            break;
        }
    }

    /**
     * @param string $package
     *
     * @return string
     */
    abstract protected function getCss(string $package);

    /**
     * @param string $package
     *
     * @return string
     */
    abstract protected function getJs(string $package);
}