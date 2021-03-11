<?php
namespace Dagou\FontAwesome\Registry;

use TYPO3\CMS\Core\SingletonInterface;

class FontAwesome implements SingletonInterface {
    /**
     * @var array
     */
    protected $storage = [];

    /**
     * @param $name
     * @param $value
     */
    public function set($name, $value) {
        $this->storage[$name] = $value;
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function get($name) {
        return $this->storage[$name];
    }
}