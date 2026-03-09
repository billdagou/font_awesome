<?php
namespace Dagou\FontAwesome\Source;

use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements SourceInterface, SingletonInterface {
    protected const string URL = '';
    protected const string VERSION = '7.2.0';

    /**
     * @param string $pack
     * @param string $family
     * @param string $style
     *
     * @return string
     */
    public function getCss(string $pack, string $family, string $style): string {
        return static::URL.'css/'
            .match ($pack) {
                'all', 'fontawesome', 'svg', 'svg-with-js', 'v4-font-face', 'v4-shims', 'v5-font-face' => $pack,
                'core' => 'fontawesome',
                'svg-js' => 'svg-with-js',
                'v4-font' => 'v4-font-face',
                'v5-font' => 'v5-font-face',
                default => $this->getBuild($pack, $family, $style),
            }
            .'.min.css';
    }

    /**
     * @param string $pack
     * @param string $family
     * @param string $style
     *
     * @return string
     */
    public function getJs(string $pack, string $family, string $style): string {
        return static::URL.'js/'
            .match ($pack) {
                'all', 'conflict-detection', 'fontawesome', 'v4-shims' => $pack,
                'conflict' => 'conflict-detection',
                'core' => 'fontawesome',
                default => $this->getBuild($pack, $family, $style),
            }
            .'.min.js';
    }

    /**
     * @param string $pack
     * @param string $family
     * @param string $style
     *
     * @return string
     */
    protected function getBuild(string $pack, string $family, string $style): string {
        $array = [$style];

        switch ($pack) {
            case '':
            case 'classic':
                if ($family === 'duotone') {
                    if ($style === 'solid') {
                        $array = [$family];
                    } else {
                        array_unshift($array, $family);
                    }
                }

                break;
            case 'sharp':
                if ($family === 'duotone') {
                    array_unshift($array, $family);
                }

                array_unshift($array, $pack);

                break;
            case 'brands':
                $array = [$pack];

                break;
            case 'chisel':
                $array = [$pack, 'regular'];

                break;
            case 'etch':
                $array = [$pack, 'solid'];

                break;
            case 'jelly':
                $array = ['regular'];

                if (in_array($family, ['fill', 'duo'])) {
                    array_unshift($array, $family);
                }

                array_unshift($array, $pack);

                break;
            case 'notdog':
                $array = ['solid'];

                if ($family === 'duo') {
                    array_unshift($array, $family);
                }

                array_unshift($array, $pack);

                break;
            case 'slab':
                $array = ['regular'];

                if ($family === 'press') {
                    array_unshift($array, $family);
                }

                array_unshift($array, $pack);

                break;
            case 'thumbprint':
                $array = [$pack, 'light'];

                break;
            case 'whiteboard':
                $array = [$pack, 'semibold'];

                break;
        };

        return implode('-', $array);
    }
}