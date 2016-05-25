<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['CDN'] = [
	'None' => '',
	'MaxCDN' => '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
];