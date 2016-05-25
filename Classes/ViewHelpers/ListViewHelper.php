<?php
namespace Dagou\FontAwesome\ViewHelpers;

class ListViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {
	/**
	 * @var string
	 */
	protected $tagName = 'ul';

	/**
	 * {@inheritDoc}
	 * @see \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		$this->registerArgument('class', 'string', 'CSS class(es) for this element.');
	}

	/**
	 * @return string
	 */
	public function render() {
		$this->tag->addAttribute('class', 'fa-ul'.($this->arguments['class'] ? ' '.$this->arguments['class'] : ''));

		$this->viewHelperVariableContainer->add(\Dagou\FontAwesome\ViewHelpers\ListViewHelper::class, 'list', TRUE);

		if (($content = $this->renderChildren())) {
			$this->tag->setContent($content);
		}

		$this->viewHelperVariableContainer->remove(\Dagou\FontAwesome\ViewHelpers\ListViewHelper::class, 'list');

		if ($content) {
			return $this->tag->render();
		}
	}
}