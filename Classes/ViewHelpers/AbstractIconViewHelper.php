<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Animation;
use Dagou\FontAwesome\Traits\Border;
use Dagou\FontAwesome\Traits\FixedWidth;
use Dagou\FontAwesome\Traits\Flip;
use Dagou\FontAwesome\Traits\Icon;
use Dagou\FontAwesome\Traits\Inverse;
use Dagou\FontAwesome\Traits\Processor;
use Dagou\FontAwesome\Traits\Pull;
use Dagou\FontAwesome\Traits\Rotate;
use Dagou\FontAwesome\Traits\Size;
use Dagou\FontAwesome\Traits\Stack;
use Dagou\FontAwesome\Traits\Style;
use Dagou\FontAwesome\Traits\Transform;
use Dagou\FontAwesome\ViewHelpers\Mask\AbstractIconViewHelper as MaskIconViewHelper;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

abstract class AbstractIconViewHelper extends AbstractTagBasedViewHelper {
    use Animation, Border, FixedWidth, Flip, Icon, Inverse, Processor, Pull, Rotate, Size, Stack, Style, Transform;

    /**
     * @var string
     */
    protected $tagName = 'i';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('icon', 'string', 'Icon name', TRUE);
        $this->registerArgument('sharp', 'boolean', 'Sharp icon or not');
        $this->registerArgument('size', 'string', 'Icon size');
        $this->registerArgument('fixedWidth', 'boolean', 'Fixed width or not');
        $this->registerArgument('rotate', 'string', 'Rotate icon');
        $this->registerArgument('flip', 'string', 'Flip icon');
        $this->registerArgument('animation', 'string', 'Animating icon');
        $this->registerArgument('border', 'boolean', 'Bordered or not');
        $this->registerArgument('pull', 'string', 'Pulled icon');

        $this->registerArgument('list', 'boolean', 'List icon or not', FALSE, TRUE);

        $this->registerArgument('large', 'boolean', 'Stack larger icon or not');

        $this->registerArgument('inverse', 'boolean', 'Inversed color or not');

        $this->registerArgument('grow', 'int', 'Scale up', FALSE, 0);
        $this->registerArgument('shrink', 'int', 'Scale down', FALSE, 0);
        $this->registerArgument('up', 'int', 'Move up', FALSE, 0);
        $this->registerArgument('right', 'int', 'Move right', FALSE, 0);
        $this->registerArgument('down', 'int', 'Move down', FALSE, 0);
        $this->registerArgument('left', 'int', 'Move left', FALSE, 0);

        $this->registerUniversalTagAttributes();
    }

    /**
     * @return string
     */
    public function render(): string {
        $classes = [];
        $data = [];

        $this->process($classes, $data, 'style', 'icon', 'size', 'fixedWidth', 'rotate', 'flip', 'animation', 'border', 'pull', 'stack', 'inverse', 'transform');

        if ($this->tag->getAttribute('class')) {
            $classes[] = $this->tag->getAttribute('class');
        }

        $this->tag->addAttribute('class', implode(' ', $classes));

        if ($this->viewHelperVariableContainer->get(MaskIconViewHelper::class, 'mask')) {
            $data['fa-mask'] = implode(' ', $this->viewHelperVariableContainer->get(MaskIconViewHelper::class, 'mask'));

            if ($this->viewHelperVariableContainer->get(MaskIconViewHelper::class, 'maskId')) {
                $data['fa-mask-id'] = $this->viewHelperVariableContainer->get(MaskIconViewHelper::class, 'maskId');
            }
        }

        if ($data) {
            if ($this->tag->getAttribute('data')) {
                ArrayUtility::mergeRecursiveWithOverrule($data, $this->tag->getAttribute('data'));
            }

            $this->tag->addAttribute('data', $data);
        }

        $this->tag->forceClosingTag(TRUE);

        if ($this->viewHelperVariableContainer->get(ListViewHelper::class, 'isList') && $this->arguments['list']) {
            return '<span class="fa-li">'.$this->tag->render().'</span>';
        }

        return $this->tag->render();
    }
}