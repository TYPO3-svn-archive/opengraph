<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');

// extension name
$extensionName = t3lib_div::underscoredToUpperCamelCase($_EXTKEY);
$pluginSignature = strtolower($extensionName) . '_pi1';

// tca config
$TCA['pages']['columns'] += array(
  'tx_opengraph_active' => array(
    'exclude' => 1,
    'label'   => 'Use this page as Open Graph Object:',
    'config'  => array(
      'type' => 'check',
      'items' => array(
        array('', ''),
      ),
    ),
  ),
  'tx_opengraph_type' => array(
    'exclude' => 1,
    'label'   => 'Type of content:',
    'displayCond' => 'FIELD:tx_opengraph_active:REQ:true',
    'config'  => array(
      'type' => 'select',
      'items' => array (
        array('Activities:', '--div--'),
        array('activity', 'activity'),
        array('sport', 'sport'),
        array('Businesses:', '--div--'),
        array('bar', 'bar'),
        array('company', 'company'),
        array('cafe', 'cafe'),
        array('hotel', 'hotel'),
        array('restaurant', 'restaurant'),
        array('Groups:', '--div--'),
        array('cause', 'cause'),
        array('sports_league', 'sports_league'),
        array('sports_team', 'sports_team'),
        array('Organizations:', '--div--'),
        array('band', 'band'),
        array('government', 'government'),
        array('non_profit', 'non_profit'),
        array('school', 'school'),
        array('university', 'university'),
        array('People:', '--div--'),
        array('actor', 'actor'),
        array('athlete', 'athlete'),
        array('author', 'author'),
        array('director', 'director'),
        array('musician', 'musician'),
        array('politician', 'politician'),
        array('public_figure', 'public_figure'),
        array('Places:', '--div--'),
        array('city', 'city'),
        array('country', 'country'),
        array('landmark', 'landmark'),
        array('state_province', 'state_province'),
        array('Products and Entertainment:', '--div--'),
        array('album', 'album'),
        array('book', 'book'),
        array('drink', 'drink'),
        array('food', 'food'),
        array('game', 'game'),
        array('movie', 'movie'),
        array('product', 'product'),
        array('song', 'song'),
        array('tv_show', 'tv_show'),
        array('Websites:', '--div--'),    
        array('article', 'article'),
        array('blog', 'blog'),
        array('website', 'website'),
      )
    ),
  ),
  'tx_opengraph_image' => array(
    'exclude' => 1,
    'label'   => 'Image:',
    'displayCond' => 'FIELD:tx_opengraph_active:REQ:true',
    'config' => array (
      'type' => 'group',
      'internal_type' => 'file',
      'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'], 
      'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'], 
      'show_thumbs' => 1, 
      'size' => 1,  
      'minitems' => 0,
      'maxitems' => 1,
      ),
  ),
  'tx_opengraph_additional' => array(
    'exclude' => 1,
    'label'   => 'Additional information:',
    'displayCond' => 'FIELD:tx_opengraph_active:REQ:true',
    'config'  => array(
      "type" => "text",
      "cols" => "55",
      "rows" => "25",
      "wrap" => "off",
    ),
  ),
);

// page config reload
$TCA['pages']['ctrl']['requestUpdate'] .= ',tx_opengraph_active';

// add tca to page config
t3lib_div::loadTCA('pages');
t3lib_extMgm::addTCAcolumns('pages', '$tempColumns', 1);
t3lib_extMgm::addToAllTCAtypes('pages','tx_opengraph_active;;;;1-1-1,tx_opengraph_type;;;;1-1-1,tx_opengraph_image;;;;1-1-1,tx_opengraph_additional;;;;1-1-1','','after:description');

?>