<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Size;
use Dagou\FontAwesome\Traits\Width;

/**
 * @see https://docs.fontawesome.com/web/style/layer
 */
final class LayerViewHelper extends AbstractFontAwesomeViewHelper {
    use Size, Width;

    /**
     * @var string
     */
    protected $tagName = 'span';

    protected array $classes = [
        'fa-layers',
    ];
    protected array $supportedStyles = [
        'width',
        'size',
    ];

    /**
     * @return void
     */
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerStylesArguments();

        $this->registerArgument('width', 'boolean', 'Fixed width', FALSE, TRUE);
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->viewHelperVariableContainer->add(self::class, 'isLayer', TRUE);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(self::class, 'isLayer');

        if ($content) {
            $this->processStyles();

            $this->tag->setContent($content);

            return $this->tag->render();
        }

        return '';
    }
    /**
     * @return void
     */
    protected function processWidth(): void {
        if ($this->arguments['width'] === TRUE) {
            $this->classes[] = 'fa-fw';
        }
    }
}