<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Traits\Size;

/**
 * @see https://docs.fontawesome.com/web/style/stack
 */
final class StackViewHelper extends AbstractFontAwesomeViewHelper {
    use Size;

    /**
     * @var string
     */
    protected $tagName = 'span';

    protected array $classes = [
        'fa-stack',
    ];
    protected array $supportedStyles = [
        'size',
    ];

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
        $this->viewHelperVariableContainer->add(self::class, 'isStack', TRUE);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(self::class, 'isStack');

        if ($content) {
            $this->processStyles();

            $this->tag->setContent($content);

            return $this->tag->render();
        }

        return '';
    }
}