<?php
namespace Dagou\FontAwesome\Cdn;

use Dagou\FontAwesome\Interfaces\Cdn;
use Dagou\FontAwesome\Traits\ExtConf;
use Dagou\FontAwesome\Traits\Package;
use Dagou\FontAwesome\Traits\PageRenderer;
use Dagou\FontAwesome\Traits\Type;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractCdn implements Cdn, SingletonInterface {
    use ExtConf, PageRenderer, Type, Package;

    /**
     * @param array $packages
     * @param string $type
     * @param bool $footer
     */
    public function load(array $packages = [], string $type = 'js', bool $footer = TRUE) {
        if (count($packages)) {
            if (!$this->isValidType($type)) {
                $type = 'js';
            }

            if (in_array('all', $packages)) {
                $this->loadPackage('all', $type, $footer);
            } else {
                foreach ($packages as $package) {
                    if ($this->isValidPackage($package)) {
                        $this->loadPackage($package, $type);
                    }
                }

                $this->loadPackage('fontawesome', $type, $footer);
            }
        }
    }

    /**
     * @param string $package
     * @param string $type
     * @param bool $footer
     */
    protected function loadPackage(string $package, string $type, bool $footer) {
        switch ($type) {
            case 'js':
                if ($footer) {
                    $this->getPageRenderer()->addJsFooterLibrary('font_awesome', $this->getJs($package));
                } else {
                    $this->getPageRenderer()->addJsLibrary('font_awesome', $this->getJs($package));
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