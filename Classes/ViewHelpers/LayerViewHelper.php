<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\FixedWidth;
use Dagou\FontAwesome\Traits\Processor;
use Dagou\FontAwesome\Traits\Size;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class LayerViewHelper extends AbstractTagBasedViewHelper {
    use FixedWidth, Processor, Size;

    /**
     * @var string
     */
    protected $tagName = 'span';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('fixedWidth', 'boolean', 'Fixed width or not', FALSE, TRUE);
        $this->registerArgument('size', 'string', 'Icon size');
        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->viewHelperVariableContainer->add(self::class, 'isLayer', TRUE);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(self::class, 'isLayer');

        if ($content) {
            $classes = [
                'fa-layers',
            ];
            $data = [];

            $this->process($classes, $data, 'fixedWidth', 'size');

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