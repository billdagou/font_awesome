<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Size;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class ListViewHelper extends AbstractTagBasedViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'ul';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->viewHelperVariableContainer->add(ListViewHelper::class, 'isList', TRUE);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(ListViewHelper::class, 'isList');

        if ($content) {
            $classes = [
                'fa-ul',
            ];

            if ($this->tag->getAttribute('class')) {
                $classes[] = $this->tag->getAttribute('class');
            }

            $this->tag->addAttribute('class', implode(' ', $classes));

            $this->tag->setContent($content);

            return $this->tag->render();
        }

        return '';
    }
}