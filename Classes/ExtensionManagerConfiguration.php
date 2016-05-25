<?php
namespace Dagou\FontAwesome;

class ExtensionManagerConfiguration {
	/**
	 * @param array $params
	 * @param \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper
	 * @return string
	 */
	public function renderCDNSelector(array $params, \TYPO3\CMS\Extensionmanager\ViewHelpers\Form\TypoScriptConstantsViewHelper $typoScriptConstantsViewHelper) {
		$selector = '<select id="em-'.$params['propertyName'].'" class="form-control" name="'.$params['fieldName'].'">';

		foreach ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN'] as $cdn => $_) {
			$selector .= '<option value="'.htmlspecialchars($cdn).'"'.($params['fieldValue'] == $cdn ? ' selected="selected"' : '').'>'.$GLOBALS['LANG']->sL($cdn, TRUE).'</option>';
		}

		$selector .= '</select>';

		return $selector;
	}
}