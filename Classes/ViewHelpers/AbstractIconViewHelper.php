<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Animation;
use Dagou\FontAwesome\Traits\Flip;
use Dagou\FontAwesome\Traits\Pull;
use Dagou\FontAwesome\Traits\Rotate;
use Dagou\FontAwesome\Traits\Size;
use Dagou\FontAwesome\Traits\Style;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

abstract class AbstractIconViewHelper extends AbstractTagBasedViewHelper {
    use Animation, Flip, Pull, Rotate, Size, Style;
    /**
     * @var string
     */
    protected $tagName = 'i';
    /**
     * @var string
     */
    protected $stylePrefix = '';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('icon', 'string', 'Icon name.', TRUE);
        $this->registerArgument('size', 'string', 'Icon size.');
        $this->registerArgument('fixedWidth', 'boolean', 'Fixed width or not.');
        $this->registerArgument('border', 'boolean', 'Bordered or not.');
        $this->registerArgument('pull', 'string', 'Pulled icon.');
        $this->registerArgument('animation', 'string', 'Animated icon.');
        $this->registerArgument('rotate', 'string', 'Rotated icon.');
        $this->registerArgument('flip', 'string', 'Flipped icon.');
        $this->registerArgument('inverse', 'boolean', 'Inversed color or not.');

        $this->registerArgument('largerIcon', 'boolean', 'Stack larger icon or not.');

        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     */
    public function render() {
        $classes = [
            $this->stylePrefix,
            'fa-'.$this->arguments['icon'],
        ];

        if ($this->arguments['size'] && $this->isValidSize($this->arguments['size'])) {
            $classes[] = 'fa-'.$this->arguments['size'];
        }

        if ($this->arguments['fixedWidth']) {
            $classes[] = 'fa-fw';
        }

        if ($this->arguments['pull'] && $this->isValidPull($this->arguments['pull'])) {
            $classes[] = 'fa-pull-'.$this->arguments['pull'];
        }

        if ($this->arguments['border']) {
            $classes[] = 'fa-border';
        }

        if ($this->arguments['animation'] && $this->isValidAnimation($this->arguments['animation'])) {
            $classes[] = 'fa-'.$this->arguments['animation'];
        }

        if ($this->arguments['flip'] && $this->isValidFlip($this->arguments['flip'])) {
            $classes[] = 'fa-flip-'.$this->arguments['flip'];
        } elseif ($this->arguments['rotate'] && $this->isValidRotate($this->arguments['rotate'])) {
            $classes[] = 'fa-rotate-'.$this->arguments['rotate'];
        }

        if ($this->viewHelperVariableContainer->get(StackViewHelper::class, 'isStack')) {
            if ($this->arguments['largerIcon']) {
                $classes[] = 'fa-stack-2x';
            } else {
                $classes[] = 'fa-stack-1x';
            }
        }

        if ($this->arguments['inverse']) {
            $classes[] = 'fa-inverse';
        }

        if ($this->tag->getAttribute('class')) {
            $classes[] = $this->tag->getAttribute('class');
        }

        $this->tag->addAttribute('class', implode(' ', $classes));

        $this->tag->forceClosingTag(TRUE);

        if ($this->viewHelperVariableContainer->get(ListViewHelper::class, 'isList')) {
            return '<span class="fa-li">'.$this->tag->render().'</span>';
        }

        return $this->tag->render();
    }
}