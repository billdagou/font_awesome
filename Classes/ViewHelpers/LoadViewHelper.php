<?php
namespace Dagou\FontAwesome\ViewHelpers;

use Dagou\FontAwesome\Utility\FontAwesomeUtility;

class LoadViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	public function render() {
		FontAwesomeUtility::loadFontAwesome();
	}
}