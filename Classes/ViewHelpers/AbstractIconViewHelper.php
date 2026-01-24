<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Animation;
use Dagou\FontAwesome\Traits\Border;
use Dagou\FontAwesome\Traits\Duotone;
use Dagou\FontAwesome\Traits\Family;
use Dagou\FontAwesome\Traits\Flip;
use Dagou\FontAwesome\Traits\Icon;
use Dagou\FontAwesome\Traits\Inverse;
use Dagou\FontAwesome\Traits\Mask;
use Dagou\FontAwesome\Traits\Pull;
use Dagou\FontAwesome\Traits\Rotate;
use Dagou\FontAwesome\Traits\Size;
use Dagou\FontAwesome\Traits\Stack;
use Dagou\FontAwesome\Traits\Style;
use Dagou\FontAwesome\Traits\Transform;
use Dagou\FontAwesome\Traits\Width;

abstract class AbstractIconViewHelper extends AbstractFontAwesomeViewHelper {
    use Animation, Border, Duotone, Family, Flip, Icon, Inverse, Mask, Pull, Rotate, Size, Stack, Style, Transform, Width;

    /**
     * @var string
     */
    protected $tagName = 'i';

    protected array $families = [
        'duotone',
        'sharp',
        'sharp-duotone',
    ];
    protected array $supportedStyles = [
        'family',
        'duotone',
        'style',
        'icon',
        'size',
        'width',
        'rotate',
        'flip',
        'animation',
        'border',
        'pull',
        'stack',
        'inverse',
        'transform',
        'mask',
    ];

    /**
     * @return void
     */
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('list', 'boolean', 'List icon', FALSE, TRUE);

        $this->registerStylesArguments();
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->processStyles();

        $this->tag->forceClosingTag(TRUE);

        if ($this->viewHelperVariableContainer->get(ListViewHelper::class, 'isList') && $this->arguments['list']) {
            return '<span class="fa-li">'.$this->tag->render().'</span>';
        }

        return $this->tag->render();
    }
}