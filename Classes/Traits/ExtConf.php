<?php
namespace Dagou\FontAwesome\Traits;

trait ExtConf {
    /**
     * @var array
     */
    protected static $extConf;

    /**
     * @return array
     */
    protected function getExtConf() {
        if (self::$extConf === NULL) {
            self::$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['font_awesome']);
        }

        return self::$extConf;
    }
}