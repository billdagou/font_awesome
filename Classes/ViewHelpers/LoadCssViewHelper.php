<?php
namespace Dagou\FontAwesome\ViewHelpers;

class LoadCssViewHelper extends AbstractLoadViewHelper {
    public function render() {
        $this->viewHelperVariableContainer->add(AbstractLoadViewHelper::class, 'technology', 'css');

        $cdn = $this->getCDN((bool)$this->arguments['files']);

        $cdn->loadCss($this->getStyles(), $this->arguments['files']);
    }
}