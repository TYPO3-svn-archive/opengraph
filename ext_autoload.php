<?php

$extensionClassesPath = t3lib_extMgm::extPath('opengraph') . 'Classes/';

return array(
  'tx_opengraph_hook_header' => $extensionClassesPath . 'Hook/Header.php',
  'tslib_cObj' => PATH_site . 'typo3/sysext/cms/tslib/class.tslib_content.php',
)

?>