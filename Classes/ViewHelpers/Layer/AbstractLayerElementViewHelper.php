<?php
namespace Dagou\FontAwesome\ViewHelpers\Layer;

use Dagou\FontAwesome\ViewHelpers\AbstractIconViewHelper;

abstract class AbstractLayerElementViewHelper extends AbstractIconViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'span';

    /**
     * @return void
     */
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerStylesArguments();
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->processStyles();

        return $this->tag->render();
    }
}