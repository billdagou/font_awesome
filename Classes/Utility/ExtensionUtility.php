<?php
namespace Dagou\FontAwesome\Utility;

final class ExtensionUtility {
    /**
     * @param string $sourceClassName
     *
     * @return void
     */
    public static function registerSource(string $sourceClassName): void {
        $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['Source'] = $sourceClassName;
    }

    /**
     * @return string
     * @internal
     */
    public static function getSource(): string {
        return $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['font_awesome']['Source'] ?? '';
    }
}