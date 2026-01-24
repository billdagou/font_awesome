<?php
namespace Dagou\FontAwesome\ViewHelpers\Mask;

use Dagou\FontAwesome\ViewHelpers\AbstractIconViewHelper;

/**
 * @see https://docs.fontawesome.com/web/style/mask
 */
abstract class AbstractMaskIconViewHelper extends AbstractIconViewHelper {
    protected array $supportedStyles = [
        'family',
        'style',
        'icon',
    ];

    /**
     * @return void
     */
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('id', 'string', 'Mask ID');

        $this->registerStylesArguments();
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->processStyles();

        $this->viewHelperVariableContainer->add(self::class, 'mask', $this->classes);
        $this->viewHelperVariableContainer->add(self::class, 'maskId', $this->arguments['id']);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(self::class, 'maskId');
        $this->viewHelperVariableContainer->remove(self::class, 'mask');

        return $content;
    }
}