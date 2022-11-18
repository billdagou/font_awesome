<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\Interfaces\Framework;

trait Transform {
    /**
     * @param array $classes
     * @param array $data
     */
    protected function transform(array &$classes, array &$data) {
        if ($GLOBALS['TSFE']->fe_user->getKey('ses', Framework::NAME) === Framework::JS) {
            $transform = [];

            if ($this->arguments['grow'] !== $this->arguments['shrink']) {
                $transform[$this->arguments['grow'] > $this->arguments['shrink'] ? 'grow' : 'shrink'] =
                    abs($this->arguments['grow'] - $this->arguments['shrink']);
            }

            if ($this->arguments['up'] !== $this->arguments['down']) {
                $transform[$this->arguments['up'] > $this->arguments['down'] ? 'up' : 'down'] =
                    abs($this->arguments['up'] - $this->arguments['down']);
            }

            if ($this->arguments['left'] !== $this->arguments['right']) {
                $transform[$this->arguments['left'] > $this->arguments['right'] ? 'left' : 'right'] =
                    abs($this->arguments['left'] - $this->arguments['right']);
            }

            if ($this->arguments['rotate'] && is_numeric($this->arguments['rotate'])) {
                $transform['rotate'] = $this->arguments['rotate'];
            }

            $flips = [
                'h',
                'v',
            ];

            if ($this->arguments['flip']) {
                if (in_array($this->arguments['flip'], $flips)) {
                    $transform['flip'] = $this->arguments['flip'];
                } elseif ($this->arguments['flip'] === 'b') {
                    $transform['flip'] = 'v flip-h';
                }
            }

            if ($transform) {
                $data['fa-transform'] = '';

                foreach ($transform as $key => $value) {
                    $data['fa-transform'] .= ($data['fa-transform'] ? ' ' : '').$key.'-'.$value;
                }
            }
        }
    }
}