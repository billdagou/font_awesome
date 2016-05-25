<?php
namespace Dagou\FontAwesome\ViewHelpers;

class IconViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {
	/**
	 * @var array
	 */
	protected $animation = ['pulse', 'spin'];

	/**
	 * @var array
	 */
	protected $flip = ['horizontal', 'vertical'];

	/**
	 * @var array
	 */
	protected $pull = ['left', 'right'];

	/**
	 * @var array
	 */
	protected $rotate = ['90', '180', '270'];

	/**
	 * @var array
	 */
	protected $size = ['lg', '2x', '3x', '4x', '5x'];

	/**
	 * @var array
	 */
	protected $stackSize = ['1x', '2x'];

	/**
	 * @var string
	 */
	protected $tagName = 'i';

	/**
	 * {@inheritDoc}
	 * @see \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper::initializeArguments()
	 */
	public function initializeArguments() {
		$this->registerArgument('animation', 'string', 'Spin or pulse.');
		$this->registerArgument('border', 'boolean', 'Whether the icon is bordered or not.');
		$this->registerArgument('class', 'string', 'CSS class(es) for this element.');
		$this->registerArgument('fixed-width', 'boolean', 'Whether the icon is fixed width or not.');
		$this->registerArgument('flip', 'string', 'Horizontal or vertical.');
		$this->registerArgument('icon', 'string', 'FontAwesome icon name.', TRUE);
		$this->registerArgument('inverse', 'boolean', 'Whether the icon color is inversed or not. ONLY works for stack!!!');
		$this->registerArgument('pull', 'string', 'Pull left or right.');
		$this->registerArgument('rotate', 'string', '90, 180, or 270.');
		$this->registerArgument('size', 'string', 'Icon size.');
		$this->registerArgument('stack-size', 'string', 'Stack size. ONLY works for stack!!!');
	}

	/**
	 * @return string
	 */
	public function render() {
		$this->tag->forceClosingTag(TRUE);

		$classes = ['fa', 'fa-'.$this->arguments['icon']];

		if ($this->viewHelperVariableContainer->exists(\Dagou\FontAwesome\ViewHelpers\ListViewHelper::class, 'list')) {
			array_unshift($classes, 'fa-li');
		}

		if ($this->viewHelperVariableContainer->exists(\Dagou\FontAwesome\ViewHelpers\StackViewHelper::class, 'stack')) {
			if ($this->arguments['stack-size'] && in_array($this->arguments['stack-size'], $this->stackSize)) {
				$classes[] = 'fa-stack-'.$this->arguments['stack-size'];
			}

			if ($this->arguments['inverse']) {
				$classes[] = 'fa-inverse';
			}
		}

		if ($this->arguments['animation'] && in_array($this->arguments['animation'], $this->animation)) {
			$classes[] = 'fa-'.$this->arguments['animation'];
		}

		if ($this->arguments['size'] && in_array($this->arguments['size'], $this->size)) {
			$classes[] = 'fa-'.$this->arguments['size'];
		}

		if ($this->arguments['flip'] && in_array($this->arguments['flip'], $this->flip)) {
			$classes[] = 'fa-flip-'.$this->arguments['flip'];
		} elseif ($this->arguments['rotate'] && in_array($this->arguments['rotate'], $this->rotate)) {
			$classes[] = 'fa-rotate-'.$this->arguments['rotate'];
		}

		if ($this->arguments['fixed-width']) {
			$classes[] = 'fa-fw';
		}

		if ($this->arguments['pull'] && in_array($this->arguments['pull'], $this->pull)) {
			$classes[] = 'fa-pull-'.$this->arguments['pull'];
		}

		if ($this->arguments['border']) {
			$classes[] = 'fa-border';
		}

		if ($this->arguments['class']) {
			$classes[] = $this->arguments['class'];
		}

		$this->tag->addAttribute('class', implode(' ', $classes));
		$this->tag->addAttribute('aria-hidden', 'true');

		return $this->tag->render();
	}
}