<?php

/***************************************************************
*  Copyright notice
*
*  (c) 2010 Sascha Korth <sascha@brotherskorth.com>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * A header hook for adding additional data
 *
 * @version $Id:$
 * @package Opengraph
 * @subpackage Hook
 * @copyright Copyright belongs to the respective authors
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 */
class Tx_Opengraph_Hook_Header {
  
  /**
   * Implements the hook render-preProcess that gets invoked
   * when the page header gets rendered.
   * 
   * @param array $params
   * @param array $pObj
   * @return void
   */
  function headerData(&$params, &$pObj) {
      
    // check before using opengraph
    if(TYPO3_MODE == 'FE' && $GLOBALS['TSFE']->page['tx_opengraph_active'] == '1') {
      
      // add default tags
      array_push($params['headerData'], $this->buildTag('og','site_name', htmlspecialchars(trim($GLOBALS['TYPO3_CONF_VARS']['SYS']['sitename']))));
      array_push($params['headerData'], $this->buildTag('og','title', htmlspecialchars(trim($GLOBALS['TSFE']->page['title']))));
      array_push($params['headerData'], $this->buildTag('og','url', htmlspecialchars(trim($this->getAbsUrl($this->getTypolink())))));
      if(!empty($GLOBALS['TSFE']->page['description'])) array_push($params['headerData'], $this->buildTag('og','description', htmlspecialchars(trim($GLOBALS['TSFE']->page['description']))));
      array_push($params['headerData'], $this->buildTag('og','type', htmlspecialchars(trim($GLOBALS['TSFE']->page['tx_opengraph_type']))));
      if(!empty($GLOBALS['TSFE']->page['tx_opengraph_image'])) array_push($params['headerData'], $this->buildTag('og','image', htmlspecialchars(trim($this->getAbsUrl($GLOBALS['TSFE']->page['tx_opengraph_image'])))));
      
      // add additional tags
      if(!empty($GLOBALS['TSFE']->page['tx_opengraph_additional'])){
        $additional = explode("\n",$GLOBALS['TSFE']->page['tx_opengraph_additional']);
        foreach($additional as $item){
          if(!empty($item)){
            $parts = explode("=",$item);
            $content = $parts[1];
            $subParts = explode(":",$parts[0]);
            $space = $subParts[0];
            $name = $subParts[1];
            // replacement (not included up to now)
            if($space == 'og' && ($name == 'site_name' || $name == 'title' || $name == 'description' || $name == 'type' || $name == 'image')){
              // replace the already included header data
            }
            array_push($params['headerData'], $this->buildTag($space,$name,$content));
          }
        }
      }
    
    }
  }
  
  /**
   * Builds and returns the meta tag
   * 
   * @param string $space
   * @param string $name
   * @param string $content
   * @return string
   */
   protected function buildTag($space,$name,$content){
     return '<meta property="'.htmlspecialchars(trim($space)).':'.htmlspecialchars(trim($name)).'" content="'.htmlspecialchars(trim($content)).'"/>';
   }
   
  /**
  * Builds and returns a typolink
  * 
  * @return string
  */
  protected function getTypolink(){
    $local_cObj = t3lib_div::makeInstance('tslib_cObj');
    return $GLOBALS['TSFE']->config['config']['baseURL'] . $local_cObj->getTypoLink_URL($GLOBALS['TSFE']->id);
  }
   
  /**
  * Builds and returns the Base Url
  * 
  * @param string $link
  * @return string
  */ 
  protected function getAbsUrl($link) {
  if(substr($link,0,7) == 'http://') return $link;
  if($GLOBALS['TSFE']->config['config']['baseURL']) {
    $baseUrl = $GLOBALS['TSFE']->config['config']['baseURL'];
  if(substr($baseUrl,-1,1)!='/') $baseUrl = $baseUrl.'/';
    $result = $baseUrl.$link;
  }
  else
    $result = 'http://'.t3lib_div::getIndpEnv("HTTP_HOST").'/'.$link;
    return $result;
  }
  
}
?>