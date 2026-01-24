<?php
namespace Dagou\FontAwesome\Traits;

use Dagou\FontAwesome\ViewHelpers\Mask\AbstractMaskIconViewHelper;

trait Mask {
    /**
     * @return void
     */
    protected function processMask(): void {
        if ($this->viewHelperVariableContainer->get(AbstractMaskIconViewHelper::class, 'mask')) {
            $this->data['fa-mask'] = implode(' ', $this->viewHelperVariableContainer->get(AbstractMaskIconViewHelper::class, 'mask'));

            if ($this->viewHelperVariableContainer->get(AbstractMaskIconViewHelper::class, 'maskId')) {
                $this->data['fa-mask-id'] = $this->viewHelperVariableContainer->get(AbstractMaskIconViewHelper::class, 'maskId');
            }
        }
    }
}