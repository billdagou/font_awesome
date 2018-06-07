<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['CDN'] = [
    'Font Awesome' => \Dagou\FontAwesome\Cdn\FontAwesome::class,
];