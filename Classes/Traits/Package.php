<?php
namespace Dagou\FontAwesome\Traits;

trait Package {
    /**
     * @var array
     */
    protected $packages = [
        'all',
        'brands',
        'solid',
        'regular',
        'light',
        'fontawesome',
    ];

    /**
     * @param string $package
     *
     * @return bool
     */
    protected function isValidPackage(string $package): bool {
        return in_array($package, $this->packages);
    }
}