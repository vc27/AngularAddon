<?php
/**
 * File Name initiate.php
 * @package ProjectName
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
#################################################################################################### */


if ( ! defined('AngularAddon_INIT') ) {
	
	class AngularAddonSettings {		
		
		
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
		var $appName = 'AngularAddon';
		
		
	}; // end class AngularAddonSettings
	
	
	
	// Classes
	require_once( "AngularAddon.php" );
	if ( isset( $_POST['action'] ) AND ! empty( $_POST['action'] ) ) {
		require_once( "AjaxClassName.php" );
	}
	
	define( 'AngularAddon_INIT', true );
	
	
	
} // end if ( ! defined('AngularAddon_INIT') )