<?php
namespace Dagou\FontAwesome\ViewHelpers\Layer;

use Dagou\FontAwesome\Traits\Inverse;
use Dagou\FontAwesome\Traits\Processor;
use Dagou\FontAwesome\Traits\Transform;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

class Text extends AbstractTagBasedViewHelper {
    use Inverse, Processor, Transform;

    /**
     * @var string
     */
    protected $tagName = 'span';

    public function initializeArguments() {
        parent::initializeArguments();
        $this->registerArgument('inverse', 'boolean', 'Inversed color or not', FALSE, TRUE);

        $this->registerArgument('grow', 'int', 'Scale up', FALSE, 0);
        $this->registerArgument('shrink', 'int', 'Scale down', FALSE, 0);
        $this->registerArgument('up', 'int', 'Move up', FALSE, 0);
        $this->registerArgument('right', 'int', 'Move right', FALSE, 0);
        $this->registerArgument('down', 'int', 'Move down', FALSE, 0);
        $this->registerArgument('left', 'int', 'Move left', FALSE, 0);
        $this->registerUniversalTagAttributes();
    }

    public function render(): string {
        $classes = [
            'fa-layers-text',
        ];
        $data = [];

        $this->process($classes, $data, 'inverse', 'transform');

        if ($this->tag->getAttribute('class')) {
            $classes[] = $this->tag->getAttribute('class');
        }

        $this->tag->addAttribute('class', implode(' ', $classes));

        if ($data) {
            if ($this->tag->getAttribute('data')) {
                ArrayUtility::mergeRecursiveWithOverrule($data, $this->tag->getAttribute('data'));
            }

            $this->tag->addAttribute('data', $data);
        }

        return $this->tag->render();
    }
}