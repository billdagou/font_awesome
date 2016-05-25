<?php
namespace Dagou\FontAwesome\ViewHelpers;

class StackViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {
	/**
	 * @var array
	 */
	protected $size = ['lg', '2x', '3x', '4x', '5x'];

	/**
	 * @var string
	 */
	protected $tagName = 'span';

	/**
	 * {@inheritDoc}
	 * @see \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		$this->registerArgument('class', 'string', 'CSS class(es) for this element.');
		$this->registerArgument('size', 'string', 'Stack size.');
	}

	/**
	 * @return string
	 */
	public function render() {
		$classes = ['fa-stack'];

		if ($this->arguments['size'] && in_array($this->arguments['size'], $this->size)) {
			$classes[] = 'fa-'.$this->arguments['size'];
		} else {
			$classes[] = 'fa-lg';
		}

		if ($this->arguments['class']) {
			$classes[] = $this->arguments['class'];
		}

		$this->tag->addAttribute('class', implode(' ', $classes));

		$this->viewHelperVariableContainer->add(\Dagou\FontAwesome\ViewHelpers\StackViewHelper::class, 'stack', TRUE);

		if (($content = $this->renderChildren())) {
			$this->tag->setContent($content);
		}

		$this->viewHelperVariableContainer->remove(\Dagou\FontAwesome\ViewHelpers\StackViewHelper::class, 'stack');

		if ($content) {
			return $this->tag->render();
		}
	}
}