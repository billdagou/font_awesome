<?php
namespace Dagou\FontAwesome\Utility;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class FontAwesomeUtility {
	static public function loadFontAwesome() {
		/** @var \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer */
		$pageRenderer = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Page\PageRenderer::class);

		$extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['font_awesome']);

		if ($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN'][$extConf['cdn']]) {
			$pageRenderer->addCssLibrary($GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['CDN'][$extConf['cdn']]);
		} else {
			$siteRelPath = ExtensionManagementUtility::siteRelPath('font_awesome');

			$pageRenderer->addCssLibrary($siteRelPath.'Resources/Public/css/font-awesome.min.css');
		}
	}
}