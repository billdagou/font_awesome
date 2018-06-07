<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Animation;
use Dagou\FontAwesome\Traits\Flip;
use Dagou\FontAwesome\Traits\Pull;
use Dagou\FontAwesome\Traits\Rotate;
use Dagou\FontAwesome\Traits\Size;
use Dagou\FontAwesome\Traits\Style;
use TYPO3\CMS\Core\Utility\ArrayUtility;
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

        $this->registerArgument('grow', 'int', 'Scale up', FALSE, 0);
        $this->registerArgument('shrink', 'int', 'Scale down', FALSE, 0);
        $this->registerArgument('up', 'int', 'Move up', FALSE, 0);
        $this->registerArgument('right', 'int', 'Move right', FALSE, 0);
        $this->registerArgument('down', 'int', 'Move down', FALSE, 0);
        $this->registerArgument('left', 'int', 'Move left', FALSE, 0);
        $this->registerArgument('mask', 'string', 'Mask icon name');
        $this->registerArgument('maskStyle', 'string', 'Mask style', FALSE, $this->defaultStyle);

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
        $data = [];

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

        if ($this->viewHelperVariableContainer->get(LoadViewHelper::class, 'library') === 'js') {
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

            if ($this->arguments['rotate'] && $this->isValidRotate($this->arguments['rotate'])) {
                $transform['rotate'] = $this->arguments['rotate'];
            }

            if ($this->arguments['flip'] && $this->isValidRotate($this->arguments['flip'])) {
                $transform['flip'] = $this->arguments['flip'];
            }

            if (count($transform)) {
                $data['fa-transform'] = '';

                foreach ($transform as $key => $value) {
                    $data['fa-transform'] .= ($data['fa-transform'] ? ' ' : '').$key.'-'.$value;
                }
            }

            if ($this->arguments['mask']) {
                if (!$this->isValidStyle($this->arguments['maskStyle'])) {
                    $this->arguments['maskStyle'] = $this->defaultStyle;
                }

                $data['fa-mask'] = self::$styles[$this->arguments['maskStyle']].' fa-'.$this->arguments['mask'];
            }
        } else {
            if ($this->arguments['rotate'] && $this->isValidRotate($this->arguments['rotate'])) {
                $classes[] = 'fa-rotate-'.$this->arguments['rotate'];
            }

            if ($this->arguments['flip'] && $this->isValidFlip($this->arguments['flip'])) {
                $classes[] = 'fa-flip-'.self::$flips[$this->arguments['flip']];
            }
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

        if (count($data) && $this->tag->getAttribute('data')) {
            ArrayUtility::mergeRecursiveWithOverrule($data, $this->tag->getAttribute('data'));

            $this->tag->addAttribute('data', $data);
        }

        $this->tag->forceClosingTag(TRUE);

        if ($this->viewHelperVariableContainer->get(ListViewHelper::class, 'isList')) {
            return '<span class="fa-li">'.$this->tag->render().'</span>';
        }

        return $this->tag->render();
    }
}