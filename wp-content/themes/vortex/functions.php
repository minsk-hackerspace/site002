<?php
/** Load the Core Files */
require_once( trailingslashit( get_template_directory() ) . 'lib/init.php' );
new Vortex();

/** Do theme setup on the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'vortex_theme_setup' );

/** Theme setup function. */
function vortex_theme_setup() {
	
	/** Add theme support for Feed Links. */
	add_theme_support( 'automatic-feed-links' );
	
	/** Add theme support for Custom Background. */
	add_theme_support( 'custom-background', array( 'default-color' => 'fff' ) );
	
	/** Set content width. */
	vortex_set_content_width( 640 );
	
	/** Add custom image sizes. */
	add_action( 'init', 'vortex_add_image_sizes' );	
	
}

/** Adds custom image sizes */
function vortex_add_image_sizes() {
	add_image_size( 'vortex-image-featured', 640, 375, true );
}
?>