<?php
namespace Dagou\FontAwesome\ViewHelpers\Layer;

use Dagou\FontAwesome\Traits\Layer\Position;

final class CounterViewHelper extends AbstractLayerElementViewHelper {
    use Position;

    protected array $supportedStyles = [
        'position',
    ];
    protected array $classes = [
        'fa-layers-counter',
    ];
}