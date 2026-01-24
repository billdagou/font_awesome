<?php
namespace Dagou\FontAwesome\ViewHelpers;

/**
 * @see https://docs.fontawesome.com/web/style/lists
 */
final class ListViewHelper extends AbstractFontAwesomeViewHelper {
    /**
     * @var string
     */
    protected $tagName = 'ul';

    protected array $classes = [
        'fa-ul',
    ];

    /**
     * @return void
     */
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('tag', 'string', 'Tag name');

        $this->registerStylesArguments();
    }

    /**
     * @return string
     */
    public function render(): string {
        $this->viewHelperVariableContainer->add(self::class, 'isList', TRUE);

        $content = $this->renderChildren();

        $this->viewHelperVariableContainer->remove(self::class, 'isList');

        if ($content) {
            $this->processStyles();

            if ($this->arguments['tag'] === 'ol') {
                $this->tag->setTagName($this->arguments['tag']);
            }

            $this->tag->setContent($content);

            return $this->tag->render();
        }

        return '';
    }
}