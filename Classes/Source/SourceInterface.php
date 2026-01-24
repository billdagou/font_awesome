<?php
namespace Dagou\FontAwesome\Source;

interface SourceInterface {
    /**
     * @param string $pack
     * @param string $family
     * @param string $style
     *
     * @return string
     */
    public function getCss(string $pack, string $family, string $style): string;

    /**
     * @param string $pack
     * @param string $family
     * @param string $style
     *
     * @return string
     */
    public function getJs(string $pack, string $family, string $style): string;
}