<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF'][$_EXTKEY]['CDN'] = [
    'MaxCDN' => '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
];