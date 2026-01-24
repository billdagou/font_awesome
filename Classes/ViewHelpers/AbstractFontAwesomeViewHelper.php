<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Context\FrameworkContext;
use Dagou\FontAwesome\Traits\ServerRequest;
use Dagou\FontAwesome\Type\Framework;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

abstract class AbstractFontAwesomeViewHelper extends AbstractTagBasedViewHelper {
    use ServerRequest;

    protected Framework $framework;
    protected array $supportedStyles = [];
    protected array $classes = [];
    protected array $data = [];
    protected array $styles = [];

    /**
     * @return void
     */
    protected function registerStylesArguments(): void {
        foreach ($this->supportedStyles as $style) {
            $func = 'register'.ucfirst($style).'Arguments';

            if (method_exists($this, $func)) {
                $this->$func();
            }
        }
    }

    /**
     * @return void
     */
    protected function processStyles(): void {
        $this->framework = GeneralUtility::makeInstance(FrameworkContext::class, $this->getRequest())
            ->get();

        foreach ($this->supportedStyles as $style) {
            $func = 'process'.ucfirst($style);

            if (method_exists($this, $func)) {
                $this->$func();
            }
        }

        if (($class = $this->tag->getAttribute('class'))) {
            $this->classes[] = $class;
        }
        $this->tag->addAttribute('class', implode(' ', $this->classes));

        if ($this->hasArgument('data') && is_array($this->arguments['data'])) {
            ArrayUtility::mergeRecursiveWithOverrule($this->data, $this->arguments['data']);
        }
        $this->tag->addAttribute('data', $this->data);

        if ($this->styles) {
            $style = '';

            foreach ($this->styles as $name => $value) {
                $style .= $name.':'.$value.';';
            }

            if ($this->hasArgument('style')) {
                $style .= $this->arguments['style'];
            }

            $this->tag->addAttribute('style', $style);
        }
    }
}