<?php
namespace Dagou\FontAwesome\Traits;

use TYPO3\CMS\Core\Configuration\Features;

/**
 * @see https://docs.fontawesome.com/web/style/icon-canvas
 */
trait Width {
    private readonly Features $features;

    protected array $widths = [
        'fixed',
        'auto',
        'automatic',
    ];

    /**
     * @param \TYPO3\CMS\Core\Configuration\Features $features
     *
     * @return void
     */
    public function injectFeatures(Features $features): void {
        $this->features = $features;
    }

    /**
     * @return void
     */
    protected function registerWidthArguments(): void {
        $this->registerArgument('width', 'string', 'Icon width');
    }

    /**
     * @return void
     */
    protected function processWidth(): void {
        if (in_array($this->arguments['width'], $this->widths)) {
            match ($this->arguments['width']) {
                'fixed' => '',
                'auto', 'automatic' => $this->classes[] = 'fa-width-auto',
            };
        } elseif (($this->features->isFeatureEnabled('fa.fixedWidth') ?? TRUE) === FALSE) {
            $this->classes[] = 'fa-width-auto';
        }
    }
}