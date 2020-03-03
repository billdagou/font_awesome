<?php
namespace Dagou\FontAwesome\ViewHelpers;

class LoadJsViewHelper extends AbstractLoadViewHelper {
    public function initializeArguments() {
        parent::initializeArguments();

        $this->registerArgument('footer', 'boolean', 'Add to footer or not.', FALSE, TRUE);
    }

    public function render() {
        $this->viewHelperVariableContainer->add(AbstractLoadViewHelper::class, 'technology', 'js');

        $cdn = $this->getCDN((bool)$this->arguments['files']);

        $cdn->loadJs($this->getStyles(), $this->arguments['files'], $this->arguments['footer']);
    }
}