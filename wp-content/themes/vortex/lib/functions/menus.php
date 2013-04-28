<?php
/** Register nav menus. */
add_action( 'init', 'vortex_register_menus' );

/** Registers the the core menus */
function vortex_register_menus() {

	/* Register the 'primary' menu. */
	register_nav_menu( 'vortex-primary-menu', __( 'Vortex Primary Menu', 'vortex' ) );
	
}
?>