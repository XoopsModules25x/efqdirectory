<?php
// $Id: class.formradio.php 2 2008-01-27 18:16:55Z wtravel $
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
// Author: Kazumi Ono (AKA onokazu)                                          //
// URL: http://www.myweb.ne.jp/, http://www.xoops.org/, http://jp.xoops.org/ //
// Project: The XOOPS Project                                                //
// ------------------------------------------------------------------------- //
if (!defined('XOOPS_ROOT_PATH')) {
	die("XOOPS root path not defined");
}
/**
 * 
 * 
 * @package     kernel
 * @subpackage  form
 * 
 * @author	    Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 */
/**
 * A Group of radiobuttons
 * 
 * @author	Kazumi Ono	<onokazu@xoops.org>
 * @copyright	copyright (c) 2000-2003 XOOPS.org
 * 
 * @package		kernel
 * @subpackage	form
 */
class efqFormRadio extends XoopsFormElement {

	/**
     * Array of Options
	 * @var	array	
	 * @access	private
	 */
	var $_options = array();

	/**
     * Pre-selected value
	 * @var	string	
	 * @access	private
	 */
	var $_value;
	
	/**
     * Pre-selected value
	 * @var	string	
	 * @access	private
	 */
	var $_linebreak;
	/**
	 * Constructor
	 * 
	 * @param	string	$caption	Caption
	 * @param	string	$name		"name" attribute
	 * @param	string	$value		Pre-selected value
	 */
	function efqFormRadio($caption, $name, $value = null, $linebreak = null){
		$this->setCaption($caption);
		$this->setName($name);
		if (isset($value)) {
			$this->setValue($value);
		}
		if (isset($linebreak)) {
			$this->setLineBreak($linebreak);
		} else {
			$this->setLineBreak("");
		}
	}

	/**
	 * Get the pre-selected value
	 * 
	 * @return	string
	 */
	function getValue(){
		return $this->_value;
	}

	/**
	 * Get the pre-selected value
	 * 
	 * @return	string
	 */
	function getLineBreak(){
		return $this->_linebreak;
	}
	/**
	 * Set the pre-selected value
	 * 
	 * @param	$value	string
	 */
	function setValue($value){
		$this->_value = $value;
	}

	/**
	 * Set the pre-selected value
	 * 
	 * @param	$value	string
	 */
	function setLineBreak($linebreak){
		$this->_linebreak = $linebreak;
	}
	
	/**
	 * Add an option
	 * 
	 * @param	string	$value	"value" attribute - This gets submitted as form-data.
	 * @param	string	$name	"name" attribute - This is displayed. If empty, we use the "value" instead.
	 */
	function addOption($value, $name=""){
		if ( $name != "" ) {
			$this->_options[$value] = $name;
		} else {
			$this->_options[$value] = $value;
		}
	}

	/**
	 * Adds multiple options
	 * 
	 * @param	array	$options	Associative array of value->name pairs.
	 */
	function addOptionArray($options){
		if ( is_array($options) ) {
			foreach ( $options as $k=>$v ) {
				$this->addOption($k, $v);
			}
		}
	}

	/**
	 * Gets the options
	 * 
	 * @return	array	Associative array of value->name pairs.
	 */
	function getOptions(){
		return $this->_options;
	}

	/**
	 * Prepare HTML for output
	 * 
	 * @return	string	HTML
	 */
	function render(){
		$ret = "";
		foreach ( $this->getOptions() as $value => $name ) {
			$ret .= "<input type='radio' name='".$this->getName()."' value='".$value."'";
			$selected = $this->getValue();
			if ( isset($selected) && ($value == $selected) ) {
				$ret .= " checked='checked'";
			}
			$ret .= $this->getExtra()." />".$name."".$this->getLineBreak()."\n";
		}
		return $ret;
	}
}
?>