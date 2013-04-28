<?php
/** Function for setting the content width of a theme. */
function vortex_set_content_width( $width = '' ) {
	global $content_width;
	$content_width = absint( $width );
}

/** Function for getting the theme's content width. */
function vortex_get_content_width() {
	global $content_width;
	return $content_width;
}

/** Function for getting the theme's data */
function vortex_theme_data() {
	global $vortex;
	
	/** If the parent theme data isn't set, let grab it. */
	if ( empty( $vortex->theme_data ) ) {
		
		$vortex_theme_data = array();
		$theme_data = wp_get_theme( 'vortex' );
		$vortex_theme_data['Name'] = $theme_data->get( 'Name' );
		$vortex_theme_data['ThemeURI'] = $theme_data->get( 'ThemeURI' );
		$vortex_theme_data['AuthorURI'] = $theme_data->get( 'AuthorURI' );
		$vortex_theme_data['Description'] = $theme_data->get( 'Description' );
		
		$vortex->theme_data = $vortex_theme_data;
	
	}

	/** Return the parent theme data. */
	return $vortex->theme_data;
}
?>