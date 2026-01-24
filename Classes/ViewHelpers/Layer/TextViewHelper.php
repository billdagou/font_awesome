<?php
namespace Dagou\FontAwesome\ViewHelpers\Layer;

final class TextViewHelper extends AbstractLayerElementViewHelper {
    protected array $supportedStyles = [
        'inverse',
        'transform',
    ];
    protected array $classes = [
        'fa-layers-text',
    ];

    /**
     * @return void
     */
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('inverse', 'boolean', 'Inverse color', FALSE, TRUE);
    }
}