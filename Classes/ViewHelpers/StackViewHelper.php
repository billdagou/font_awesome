<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Processor;
use Dagou\FontAwesome\Traits\Size;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class StackViewHelper extends AbstractTagBasedViewHelper {
    use Processor, Size;

    /**
     * @var string
     */
    protected $tagName = 'span';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('size', 'string', 'Icon size.');
        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->viewHelperVariableContainer->add(self::class, 'isStack', TRUE);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(self::class, 'isStack');

        if ($content) {
            $classes = [
                'fa-stack',
            ];
            $data = [];

            $this->process($classes, $data, 'size');

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