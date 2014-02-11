<?php
/**
 * File Name AngularAddon.php
 * @package WordPress
 * @subpackage ProjectName
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################





/**
 * AngularAddon
 *
 * @version 1.0
 * @updated 00.00.00
 **/
$AngularAddon = new AngularAddon();
class AngularAddon {
	
	
	
	/**
	 * Option name
	 * 
	 * @access public
	 * @var string
	 * Description:
	 * Used for various purposes when an import may be adding content to an option.
	 **/
	var $option_name = false;
	
	
	
	/**
	 * errors
	 * 
	 * @access public
	 * @var array
	 **/
	var $errors = array();
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function __construct() {
		
		$this->set( 'settings', new AngularAddonSettings() );
		$this->set( 'template_path', get_stylesheet_directory() . "/addons/AngularAddon/" );
		$this->set( 'template_directory', get_stylesheet_directory_uri() . "/addons/AngularAddon" );

		// hook method after_setup_theme
		// add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );

		// hook method init
		add_action( 'init', array( &$this, 'init' ) );

		// hook method admin_init
		// add_action( 'admin_init', array( &$this, 'admin_init' ) );

	} // end function __construct
	
	
	
	
	
	
	/**
	 * after_setup_theme
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 *
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
	 **/
	function after_setup_theme() {
		
		// 
		
	} // end function after_setup_theme
	
	
	
	
	
	
	/**
	 * init
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/init
	 * 
	 * Description:
	 * Runs after WordPress has finished loading but before any headers are sent.
	 **/
	function init() {
		
		$this->register_style_and_scripts();
		add_action( 'wp_enqueue_scripts', array( &$this, 'wp_enqueue_scripts' ) );
		
		add_filter( 'tag_html_attr', array( &$this, 'tag_html_attr' ) );
		
	} // end function init
	
	
	
	
	
	
	/**
	 * admin_init
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 * @codex http://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
	 * 
	 * Description:
	 * admin_init is triggered before any other hook when a user access the admin area.
	 * This hook doesn't provide any parameters, so it can only be used to callback a 
	 * specified function.
	 **/
	function admin_init() {
		
		// 
		
	} // end function admin_init
	
	
	
	
	
	
	/**
	 * set
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function set( $key, $val = false ) {
		
		if ( isset( $key ) AND ! empty( $key ) ) {
			$this->$key = $val;
		}
		
	} // end function set
	
	
	
	
	
	
	/**
	 * error
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function error( $error_key ) {
		
		$this->errors[] = $error_key;
		
	} // end function error
	
	
	
	
	
	
	/**
	 * get
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function get( $key ) {
		
		if ( isset( $key ) AND ! empty( $key ) AND isset( $this->$key ) AND ! empty( $this->$key ) ) {
			return $this->$key;
		} else {
			return false;
		}
		
	} // end function get
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Functionality
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * example_function
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function example_function() {
		
		// example_function
		
	} // end function example_function
	
	
	
	
	
	
	/**
	 * Register Styles and Scripts
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function register_style_and_scripts() {
		
		// wp_register_script( 'angular-file-upload-shim', "$this->template_directory/js/angular-file-upload-shim.js" );
		wp_register_script( 'angular', "//ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular.min.js", array( 'jquery' ) );
		// wp_register_script( 'angular-file-upload', "$this->template_directory/js/angular-file-upload.js" );
		// wp_register_script( 'angular-match', "$this->template_directory/js/angular-match.js" );
		wp_register_script( 'AngularAddon', "$this->template_directory/js/AngularAddon.js", array('angular') );
		
	} // end function register_style_and_scripts
	
	
	
	
	
	
	/**
	 * Enqueue Scripts
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function wp_enqueue_scripts() {
		
		wp_localize_script( 'AngularAddon', 'AngularAddonObj', array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
	        'action' => $this->settings->action,
			'nonce' => wp_create_nonce($this->settings->action)
		) );
		wp_enqueue_script( 'AngularAddon' );
		
	} // end function wp_enqueue_scripts 
	
	
	
	
	
	
	/**
	 * tag_html_attr
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function tag_html_attr( $attr ) {
		
		$attr = " ng-app=\"" . $this->settings->appName . "\"";
		
		return $attr;
		
	} // end function tag_html_attr
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Conditionals
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * have_something
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function have_something() {
		
		if ( isset( $this->something ) AND ! empty( $this->something ) ) {
			$this->set( 'have_something', 1 );
		} else {
			$this->set( 'have_something', 0 );
		}
		
		return $this->have_something;
		
	} // end function have_something
	
	
	
} // end class AngularAddon