<?php
/** Core Theme Framework */
class Vortex {
	
	/** Constructor Method */
	function __construct() {

		/** Define a Global variable Standard Class */
		global $vortex;
		$vortex = new stdClass;
		
		/** Define framework, parent theme, and child theme constants. */
		add_action( 'after_setup_theme', array( &$this, 'constants' ), 1 );
		
		/** Load the core functions required by the rest of the framework. */
		add_action( 'after_setup_theme', array( &$this, 'core' ), 2 );
		
		/** Language functions and translations setup. */
		add_action( 'after_setup_theme', array( &$this, 'i18n' ), 3 );
		
		/** Load the framework functions. */
		add_action( 'after_setup_theme', array( &$this, 'functions' ), 12 );
		
		/** Load admin files. */
		add_action( 'wp_loaded', array( &$this, 'admin' ) );		

	}
	
	/** Define Constant Paths */
	function constants() {

		/** Directory Location Constants */
		
		/** Sets the path to the parent theme directory. */
		define( 'VORTEX_DIR', trailingslashit( get_template_directory() ) );
		define( 'VORTEX_LIB_DIR', trailingslashit( VORTEX_DIR . 'lib' ) );
		
		define( 'VORTEX_FUNCTIONS_DIR', trailingslashit( VORTEX_LIB_DIR . 'functions' ) );
		define( 'VORTEX_ADMIN_DIR', trailingslashit( VORTEX_LIB_DIR . 'admin' ) );
		define( 'VORTEX_JS_DIR', trailingslashit( VORTEX_LIB_DIR . 'js' ) );
		define( 'VORTEX_CSS_DIR', trailingslashit( VORTEX_LIB_DIR . 'css' ) );
		
		/** URI Location Constants */
		
		/** Sets the path to the parent theme directory URI. */
		define( 'VORTEX_URI', trailingslashit( get_template_directory_uri() ) );
		define( 'VORTEX_LIB_URI', trailingslashit( VORTEX_URI . 'lib' ) );
		
		define( 'VORTEX_ADMIN_URI', trailingslashit( VORTEX_LIB_URI . 'admin' ) );
		define( 'VORTEX_JS_URI', trailingslashit( VORTEX_LIB_URI . 'js' ) );
		define( 'VORTEX_CSS_URI', trailingslashit( VORTEX_LIB_URI . 'css' ) );
		
	}
	
	/** Loads the core framework functions. */
	function core() {
		
		/** Load the core framework functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'core.php' );
	
	}
	
	/** Loads translation files */
	function i18n() {

		/** Translations can be filed in the /languages/ directory */
		load_theme_textdomain( 'vortex', VORTEX_DIR . 'languages' );
		
	}
	
	/** Loads the framework functions. */
	function functions() {

		/** Load media-related functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'media.php' );
		
		/** Load utility functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'utility.php' );
		
		/** Load theme settings functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'settings.php' );
		
		/** Load menus functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'menus.php' );		
		
		/** Load sidebars functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'sidebars.php' );
		
		/** Load featured image functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'featured-image.php' );
		
		/** Load custom header functions. */
		require_once( VORTEX_FUNCTIONS_DIR . 'custom-header.php' );
		
	}
	
	/** Load admin files for the framework. */
	function admin() {

		/* Check if in the WordPress admin. */
		if ( is_admin() ) {

			/* Load the main admin file. */
			require_once( VORTEX_ADMIN_DIR . 'admin.php' );

		}
	}	
	
}
?>