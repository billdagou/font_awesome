<?php
namespace Dagou\FontAwesome\Traits;

trait Package {
    /**
     * @var array
     */
    protected static $packages = [
        'all',
        'solid',
        'regular',
        'brands',
    ];

    /**
     * @param string $package
     *
     * @return bool
     */
    protected function isValidPackage(string $package) {
        return in_array($package, self::$packages);
    }
}