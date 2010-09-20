<?php

if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

// hook into the pre-rendering process
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_pagerenderer.php']['render-preProcess'][] = 'EXT:'.$_EXTKEY.'/Legacy/class.tx_opengraph_getHeaderHook.php:tx_opengraph_getHeaderHook->headerData';

?>