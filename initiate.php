<?php
/**
 * File Name initiate.php
 * @package ProjectName
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
#################################################################################################### */


if ( ! defined('AnuglarDropIn_INIT') ) {
	
	class AnuglarDropInSettings {		
		
		
		/**
		 * action
		 * 
		 * @access public
		 * @var string
		 **/
		var $action = 'ajaxActionNameHere';
		
		
		
		/**
		 * relative_save_path
		 * 
		 * @access public
		 * @var string
		 **/
		var $relative_save_path = 'wp-content/file-upload-dir-name-here/';
		
		
		
		/**
		 * appName
		 * 
		 * @access public
		 * @var string
		 **/
		var $appName = 'AnuglarDropIn';
		
		
	}; // end class AnuglarDropInSettings
	
	
	
	// Classes
	require_once( "AnuglarDropIn.php" );
	if ( isset( $_POST['action'] ) AND ! empty( $_POST['action'] ) ) {
		require_once( "AjaxClassName.php" );
	}
	
	define( 'AnuglarDropIn_INIT', true );
	
	
	
} // end if ( ! defined('AnuglarDropIn_INIT') )