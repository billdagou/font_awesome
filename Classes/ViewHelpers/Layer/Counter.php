<?php
namespace Dagou\FontAwesome\ViewHelpers\Layer;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class Counter extends AbstractTagBasedViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'span';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     */
    public function render(): string {
        $classes = [
            'fa-layers-counter',
        ];

        if ($this->tag->getAttribute('class')) {
            $classes[] = $this->tag->getAttribute('class');
        }

        $this->tag->addAttribute('class', implode(' ', $classes));

        return $this->tag->render();
    }
}