<?php

########################################################################
# Extension Manager/Repository config file for ext "opengraph".
#
# Auto generated 25-09-2010 21:08
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Open Graph Objects',
	'description' => 'This Extension turns your pages into Open graph objects.',
	'category' => 'fe',
	'author' => 'Sascha Korth',
	'author_company' => 'Brotherskorth',
	'author_email' => 'sascha@brotherskorth.com',
	'shy' => '',
	'dependencies' => '',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'beta',
	'internal' => '',
	'uploadfolder' => '',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 1,
	'lockType' => '',
	'version' => '0.0.0',
	'constraints' => array(
		'depends' => array(
			'php' => '5.2.0-0.0.0',
			'typo3' => '4.3.0-4.4.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:10:{s:9:"ChangeLog";s:4:"7c23";s:16:"ext_autoload.php";s:4:"de69";s:12:"ext_icon.gif";s:4:"f076";s:17:"ext_localconf.php";s:4:"35d4";s:14:"ext_tables.php";s:4:"e65b";s:14:"ext_tables.sql";s:4:"ed9f";s:23:"Classes/Hook/Header.php";s:4:"d457";s:43:"Legacy/class.tx_opengraph_getHeaderHook.php";s:4:"235e";s:44:"Resources/Private/Language/locallang_csh.xml";s:4:"6bd7";s:43:"Resources/Private/Language/locallang_db.xml";s:4:"f4f9";}',
	'suggests' => array(
	),
);

?>