<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Animation;
use Dagou\FontAwesome\Traits\Flip;
use Dagou\FontAwesome\Traits\Pull;
use Dagou\FontAwesome\Traits\Rotate;
use Dagou\FontAwesome\Traits\Size;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class StackViewHelper extends AbstractTagBasedViewHelper {
    use Animation, Flip, Pull, Rotate, Size;
    /**
     * @var string
     */
    protected $tagName = 'span';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('size', 'string', 'Icon size.');
        $this->registerArgument('pull', 'string', 'Pull left or right.');
        $this->registerArgument('animation', 'string', 'Spin or pulse.');
        $this->registerArgument('rotate', 'string', 'Rotate 90, 180, or 270.');
        $this->registerArgument('flip', 'string', 'Flip horizontal or vertical.');
        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     */
    public function render() {
        $this->viewHelperVariableContainer->add(StackViewHelper::class, 'isStack', TRUE);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(StackViewHelper::class, 'isStack');

        if ($content) {
            $classes = [
                'fa-stack',
            ];

            if ($this->arguments['size'] && $this->isValidSize($this->arguments['size'])) {
                $classes[] = 'fa-'.$this->arguments['size'];
            }

            if ($this->arguments['pull'] && $this->isValidPull($this->arguments['pull'])) {
                $classes[] = 'fa-pull-'.$this->arguments['pull'];
            }

            if ($this->arguments['animation'] && $this->isValidAnimation($this->arguments['animation'])) {
                $classes[] = 'fa-'.$this->arguments['animation'];
            }

            if ($this->arguments['flip'] && $this->isValidFlip($this->arguments['flip'])) {
                $classes[] = 'fa-flip-'.$this->arguments['flip'];
            } elseif ($this->arguments['rotate'] && $this->isValidRotate($this->arguments['rotate'])) {
                $classes[] = 'fa-rotate-'.$this->arguments['rotate'];
            }

            if ($this->tag->getAttribute('class')) {
                $classes[] = $this->tag->getAttribute('class');
            }

            $this->tag->addAttribute('class', implode(' ', $classes));

            $this->tag->setContent($content);

            return $this->tag->render();
        }
    }
}