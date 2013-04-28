<?php
/** Loads the Vortex theme setting. */
function vortex_get_settings() {
	global $vortex;

	/* If the settings array hasn't been set, call get_option() to get an array of theme settings. */
	if ( !isset( $vortex->settings ) ) {
		$vortex->settings = get_option( 'vortex_options' );
	}
	
	/** return settings. */
	return $vortex->settings;
}
?>