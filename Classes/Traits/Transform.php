<?php
namespace Dagou\FontAwesome\Traits;

trait Transform {
    /**
     * @param array $classes
     * @param array $data
     */
    protected function transform(array &$classes, array &$data) {
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

        if ($this->arguments['rotate'] && !in_array($this->arguments['rotate'], $this->rotates)) {
            $transform['rotate'] = $this->arguments['rotate'];
        }

        if ($this->arguments['flip'] && !in_array($this->arguments['flip'], $this->flips)) {
            $transform['flip'] = $this->arguments['flip'];
        }

        if ($transform) {
            $data['fa-transform'] = '';

            foreach ($transform as $key => $value) {
                $data['fa-transform'] .= ($data['fa-transform'] ? ' ' : '').$key.'-'.$value;
            }
        }
    }
}