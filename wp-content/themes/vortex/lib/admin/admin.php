<?php
class VortexAdmin {
		
		/** Constructor Method */
		function __construct() {
	
			/** Load the admin_init functions. */
			add_action( 'admin_init', array( &$this, 'admin_init' ) );
			
			/* Hook the settings page function to 'admin_menu'. */
			add_action( 'admin_menu', array( &$this, 'settings_page_init' ) );		
	
		}
		
		/** Initializes any admin-related features needed for the framework. */
		function admin_init() {
			
			/** Registers admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_register_scripts' ), 1 );
		
			/** Loads admin JavaScript and Stylesheet files for the framework. */
			add_action( 'admin_enqueue_scripts', array( &$this, 'admin_enqueue_scripts' ) );
			
		}
		
		/** Registers admin JavaScript and Stylesheet files for the framework. */
		function admin_register_scripts() {
			
			/** Register Admin Stylesheet */
			wp_register_style( 'vortex-admin-css-style', esc_url( VORTEX_ADMIN_URI . 'style.css' ) );
			
			/** Register Admin Scripts */
			wp_register_script( 'vortex-admin-js-vortex', esc_url( VORTEX_ADMIN_URI . 'common.js' ) );
			wp_register_script( 'vortex-admin-js-jquery-cookie', esc_url( VORTEX_JS_URI . 'jquery-cookie/jquery.cookie.js' ) );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for the framework. */
		function admin_enqueue_scripts() {			
		}
		
		/** Initializes all the theme settings page functionality. This function is used to create the theme settings page */
		function settings_page_init() {
			
			global $vortex;
			
			/** Register theme settings. */
			register_setting( 'vortex_options_group', 'vortex_options', array( &$this, 'vortex_options_validate' ) );
			
			/* Create the theme settings page. */
			$vortex->settings_page = add_theme_page( 
				esc_html( __( 'Vortex Options', 'vortex' ) ),	/** Settings page name. */
				esc_html( __( 'Vortex Options', 'vortex' ) ),	/** Menu item name. */
				$this->settings_page_capability(),				/** Required capability */
				'vortex-options', 								/** Screen name */
				array( &$this, 'settings_page' )				/** Callback function */
			);
			
			/* Check if the settings page is being shown before running any functions for it. */
			if ( !empty( $vortex->settings_page ) ) {
				
				/** Add contextual help to the theme settings page. */
				add_action( 'load-'. $vortex->settings_page, array( &$this, 'settings_page_contextual_help' ) );
				
				/* Load the JavaScript and stylesheets needed for the theme settings screen. */
				add_action( 'admin_enqueue_scripts', array( &$this, 'settings_page_enqueue_scripts' ) );
				
				/** Configure settings Sections and Fileds. */
				$this->settings_sections();
				
				/** Configure default settings. */
				$this->settings_default();				
				
			}
			
		}
		
		/** Returns the required capability for viewing and saving theme settings. */
		function settings_page_capability() {
			return 'edit_theme_options';
		}
		
		/** Displays the theme settings page. */
		function settings_page() {
			require( VORTEX_ADMIN_DIR . 'page.php' );
		}
		
		/** Text for the contextual help for the theme settings page in the admin. */
		function settings_page_contextual_help() {
			
			/** Get the parent theme data. */
			$theme = vortex_theme_data();
			$AuthorURI = $theme['AuthorURI'];
			$ThemeURI = $theme['ThemeURI'];
		
			/** Get the current screen */
			$screen = get_current_screen();
			
			/** Add theme reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'vortex-theme',
				'title' => __( 'Theme Support', 'vortex' ),
				'content' => implode( '', file( VORTEX_ADMIN_DIR . 'help/support.html' ) ),				
				
				)
			);
			
			/** Add license reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'vortex-license',
				'title' => __( 'License', 'vortex' ),
				'content' => implode( '', file( VORTEX_ADMIN_DIR . 'help/license.html' ) ),				
				
				)
			);
			
			/** Add changelog reference help screen tab. */
			$screen->add_help_tab( array(
				
				'id' => 'vortex-changelog',
				'title' => __( 'Changelog', 'vortex' ),
				'content' => implode( '', file( VORTEX_ADMIN_DIR . 'help/changelog.html' ) ),				
				
				)
			);
			
			/** Help Sidebar */
			$sidebar = '<p><strong>' . __( 'For more information:', 'vortex' ) . '</strong></p>';
			if ( !empty( $AuthorURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $AuthorURI ) . '" target="_blank">' . __( 'Vortex Project', 'vortex' ) . '</a></p>';
			}
			if ( !empty( $ThemeURI ) ) {
				$sidebar .= '<p><a href="' . esc_url( $ThemeURI ) . '" target="_blank">' . __( 'Vortex Official Page', 'vortex' ) . '</a></p>';
			}			
			$screen->set_help_sidebar( $sidebar );
			
		}
		
		/** Loads admin JavaScript and Stylesheet files for displaying the theme settings page in the WordPress admin. */
		function settings_page_enqueue_scripts( $hook ) {
			
			/** Load Scripts For Vortex Options Page */
			if( $hook === 'appearance_page_vortex-options' ) {
				
				/** Load Admin Stylesheet */
				wp_enqueue_style( 'vortex-admin-css-style' );
				
				/** Load Admin Scripts */
				wp_enqueue_script( 'vortex-admin-js-vortex' );
				wp_enqueue_script( 'vortex-admin-js-jquery-cookie' );
				
			}
				
		}
		
		/** Configure settings Sections and Fileds */		
		function settings_sections() {
		
			/** Blog Section */
			add_settings_section( 'vortex_section_blog', 'Blog Options', array( &$this, 'vortex_section_blog_fn' ), 'vortex_section_blog_page' );			
			
			add_settings_field( 'vortex_field_nav_style', __( 'Navigation Style', 'vortex' ), array( &$this, 'vortex_field_nav_style_fn' ), 'vortex_section_blog_page', 'vortex_section_blog' );
			add_settings_field( 'vortex_field_menu_position', __( 'Menu Position', 'vortex' ), array( &$this, 'vortex_field_menu_position_fn' ), 'vortex_section_blog_page', 'vortex_section_blog' );
			add_settings_field( 'vortex_field_menu_width', __( 'Menu Width', 'vortex' ), array( &$this, 'vortex_field_menu_width_fn' ), 'vortex_section_blog_page', 'vortex_section_blog' );
			
			/** Post Section */
			add_settings_section( 'vortex_section_post', 'Post Options', array( &$this, 'vortex_section_post_fn' ), 'vortex_section_post_page' );
			
			add_settings_field( 'vortex_field_post_style', __( 'Post Style', 'vortex' ), array( &$this, 'vortex_field_post_style_fn' ), 'vortex_section_post_page', 'vortex_section_post' );
			add_settings_field( 'vortex_field_featured_image_control', __( 'Post Featured Image', 'vortex' ), array( &$this, 'vortex_field_featured_image_control_fn' ), 'vortex_section_post_page', 'vortex_section_post' );
			
			/** Footer Section */
			add_settings_section( 'vortex_section_footer', 'Footer Options', array( &$this, 'vortex_section_footer_fn' ), 'vortex_section_footer_page' );
			
			add_settings_field( 'vortex_field_copyright_control', __( 'Use Copyright', 'vortex' ), array( &$this, 'vortex_field_copyright_control_fn' ), 'vortex_section_footer_page', 'vortex_section_footer' );
			add_settings_field( 'vortex_field_copyright', __( 'Enter Copyright Text', 'vortex' ), array( &$this, 'vortex_field_copyright_fn' ), 'vortex_section_footer_page', 'vortex_section_footer' );
			
			/** General Section */
			add_settings_section( 'vortex_section_general', 'General Options', array( &$this, 'vortex_section_general_fn' ), 'vortex_section_general_page' );
			
			add_settings_field( 'vortex_field_reset_control', __( 'Reset Theme Options', 'vortex' ), array( &$this, 'vortex_field_reset_control_fn' ), 'vortex_section_general_page', 'vortex_section_general' );
		
		}
		
		/** Configure default settings. */	
		function get_settings_default()  {
			
			$default = array(
					
				'vortex_nav_style' => 'numeric',
				'vortex_menu_position' => 'default',
				'vortex_menu_width' => 940,
				
				'vortex_post_style' => 'content',
				'vortex_featured_image_control' => 'manual',
				
				'vortex_copyright_control' => 0,
				'vortex_copyright' => '',
				
				'vortex_reset_control' => 0
				
			);
			
			return $default;
			
		}
		function settings_default() {
			global $vortex;
			
			$vortex_reset_control = false;
			$vortex_options = vortex_get_settings();
			
			/** Vortex Reset Logic */
			if ( !is_array( $vortex_options ) ) {			
				$vortex_reset_control = true;			
			} 						
			elseif ( $vortex_options['vortex_reset_control'] == 1 ) {			
				$vortex_reset_control = true;			
			}			
			
			/** Let Reset Vortex */
			if( $vortex_reset_control == true ) {				
				$default = $this->get_settings_default();				
				update_option( 'vortex_options' , $default );			
			}
		
		}
		
		/** Vortex Pre-defined Range */
		
		/* Boolean Yes | No */		
		function vortex_boolean_pd() {			
			return array( 1 => __( 'yes', 'vortex' ), 0 => __( 'no', 'vortex' ) );		
		}
		
		/* Nav Style Range */		
		function vortex_nav_style_pd() {			
			return array( 'numeric' => __( 'Numeric', 'vortex' ), 'older-newer' => __( 'Older / Newer', 'vortex' ) );			
		}
		
		/* Menu Position Range */		
		function vortex_menu_position_pd() {			
			return array( 'default' => __( 'Default (Left)', 'vortex' ), 'center' => __( 'Center', 'vortex' ) );			
		}
		
		/* Post Style Range */		
		function vortex_post_style_pd() {			
			return array( 'content' => __( 'Content', 'vortex' ), 'excerpt' => __( 'Excerpt', 'vortex' ) );			
		}
		
		/* Featured Image Range */		
		function vortex_featured_image_pd() {			
			return array( 'manual' => __( 'Use Featured Image', 'vortex' ), 'auto' => __( 'Use Featured Image Automatically', 'vortex' ), 'no' => __( 'No Featured Image', 'vortex' ) );			
		}		
		
		/** Vortex Options Validation */				
		function vortex_options_validate( $input ) {
			
			/** Vortex Predefined */
			$default = $this->get_settings_default();
			$vortex_boolean_pd = $this->vortex_boolean_pd();
			$vortex_nav_style_pd = $this->vortex_nav_style_pd();
			$vortex_menu_position_pd = $this->vortex_menu_position_pd();
			$vortex_post_style_pd = $this->vortex_post_style_pd();
			$vortex_featured_image_pd = $this->vortex_featured_image_pd();						
			
			/* Validation: vortex_nav_style */
			if ( ! array_key_exists( $input['vortex_nav_style'], $vortex_nav_style_pd ) ) {
				 $input['vortex_nav_style'] = $default['vortex_nav_style'];
			}
			
			/* Validation: vortex_menu_position */
			if ( ! array_key_exists( $input['vortex_menu_position'], $vortex_menu_position_pd ) ) {
				 $input['vortex_menu_position'] = $default['vortex_menu_position'];
			}
			
			/* Validation: vortex_menu_width */
			$input['vortex_menu_width'] = absint( $input['vortex_menu_width'] );
			if ( ! ( $input['vortex_menu_width'] < 940 && $input['vortex_menu_width'] > 1 ) ) {
				 $input['vortex_menu_width'] = $default['vortex_menu_width'];
			}
			
			/* Validation: vortex_post_style */			
			if ( ! array_key_exists( $input['vortex_post_style'], $vortex_post_style_pd ) ) {
				 $input['vortex_post_style'] = $default['vortex_post_style'];
			}
			
			/* Validation: vortex_featured_image_control */			
			if ( ! array_key_exists( $input['vortex_featured_image_control'], $vortex_featured_image_pd ) ) {
				 $input['vortex_featured_image_control'] = $default['vortex_featured_image_control'];
			}										
			
			/* Validation: vortex_copyright_control */			
			if ( ! array_key_exists( $input['vortex_copyright_control'], $vortex_boolean_pd ) ) {
				 $input['vortex_copyright_control'] = $default['vortex_copyright_control'];
			}
			
			/* Validation: vortex_copyright */
			if( !empty( $input['vortex_copyright'] ) ) {
				$input['vortex_copyright'] = htmlspecialchars ( $input['vortex_copyright'] );
			}
			
			/* Validation: vortex_reset_control */
			if ( ! array_key_exists( $input['vortex_reset_control'], $vortex_boolean_pd ) ) {
				 $input['vortex_reset_control'] = $default['vortex_reset_control'];
			}
			
			add_settings_error( 'vortex_options', 'vortex_options', __( 'Settings Saved.', 'vortex' ), 'updated' );
			
			return $input;
		
		}
		
		/** Blog Section Callback */				
		function vortex_section_blog_fn() {
			echo '<div class="vortex-section-desc">
			  <p class="description">'. __( 'Customize your blog by using the following settings.', 'vortex' ) .'</p>
			</div>';
		}
		
		/* Nav Style Callback */		
		function vortex_field_nav_style_fn() {
			
			$vortex_options = get_option( 'vortex_options' );
			$items = $this->vortex_nav_style_pd();
			
			echo '<select id="vortex_nav_style" name="vortex_options[vortex_nav_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $vortex_options['vortex_nav_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select navigation style.', 'vortex' ) .'</small></div>';
		
		}
		
		/* Menu Position Callback */		
		function vortex_field_menu_position_fn() {
			
			$vortex_options = get_option( 'vortex_options' );
			$items = $this->vortex_menu_position_pd();
			
			echo '<select id="vortex_menu_position" name="vortex_options[vortex_menu_position]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $vortex_options['vortex_menu_position'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( '<strong>Center:</strong> You must specify the <em>Menu Width</em> according to your menu items in order to center it perfectly.', 'vortex' ) .'</small></div>';
		
		}
		
		/* Menu Width Callback */
		function vortex_field_menu_width_fn() {
			
			$vortex_options = get_option('vortex_options');
			echo '<input type="text" id="vortex_menu_width" name="vortex_options[vortex_menu_width]" value="'. sanitize_text_field ( $vortex_options['vortex_menu_width'] ) .'" />';
			echo '<div><small>'. __( 'Enter the menu width to center it perfectly.', 'vortex' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>Valid Range:</strong> 1 - 940', 'vortex' ) .'</small></div>';
		
		}
		
		/** Post Section Callback */				
		function vortex_section_post_fn() {
			echo '<div class="vortex-section-desc">
			  <p class="description">'. __( 'Customize your posts by using the following settings.', 'vortex' ) .'</p>
			</div>';
		}
		
		/* Post Style Callback */		
		function vortex_field_post_style_fn() {
			
			$vortex_options = get_option( 'vortex_options' );
			$items = $this->vortex_post_style_pd();
			
			echo '<select id="vortex_post_style" name="vortex_options[vortex_post_style]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $vortex_options['vortex_post_style'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select post style.', 'vortex' ) .'</small></div>';
		
		}
		
		/* Featured Image Callback */		
		function vortex_field_featured_image_control_fn() {
			
			$vortex_options = get_option( 'vortex_options' );
			$items = $this->vortex_featured_image_pd();
			
			echo '<select id="vortex_featured_image_control" name="vortex_options[vortex_featured_image_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $vortex_options['vortex_featured_image_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( '<strong>Use Featured Image:</strong> which is set in the post.', 'vortex' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>Use Featured Image Automatically:</strong> from the images uploaded to the post.', 'vortex' ) .'</small></div>';
			echo '<div><small>'. __( '<strong>No Featured Image:</strong> for the post.', 'vortex' ) .'</small></div>';
		
		}
		
		/** Footer Section Callback */				
		function vortex_section_footer_fn() {
			echo '<div class="vortex-section-desc">
			  <p class="description">'. __( 'Customize your footer by using the following settings.', 'vortex' ) .'</p>
			</div>';
		}
		
		/* Copyright Control Callback */		
		function  vortex_field_copyright_control_fn() {
			
			$vortex_options = get_option( 'vortex_options' );
			$items = $this->vortex_boolean_pd();
			
			echo '<select id="vortex_copyright_control" name="vortex_options[vortex_copyright_control]">';
			foreach( $items as $key => $val ) {
			?>
            <option value="<?php echo $key; ?>" <?php selected( $key, $vortex_options['vortex_copyright_control'] ); ?>><?php echo $val; ?></option>
            <?php
			}
			echo '</select>';
			echo '<div><small>'. __( 'Select yes to override default copyright text.', 'vortex' ) .'</small></div>';
		
		}
		
		/* Copyright Callback */
		function vortex_field_copyright_fn() {
			
			$vortex_options = get_option('vortex_options');
			echo '<textarea type="textarea" id="vortex_copyright" name="vortex_options[vortex_copyright]" rows="7" cols="50">'. esc_html ( $vortex_options['vortex_copyright'] ) .'</textarea>';
			echo '<div><small>'. __( 'Enter the copyright text.', 'vortex' ) .'</small></div>';
			echo '<div><small>Example: <strong>&amp;copy; Copyright '.date('Y').' - &lt;a href="'. home_url( '/' ) .'"&gt;'. get_bloginfo('name') .'&lt;/a&gt;</strong></small></div>';
		
		}
		
		/** General Section Callback */				
		function vortex_section_general_fn() {
			echo '<div class="vortex-section-desc">
			  <p class="description">'. __( 'Here are the general settings to customize your blog.', 'vortex' ) .'</p>
			</div>';
		}
		
		/* Reset Congrol Callback */		
		function vortex_field_reset_control_fn() {
			
			$vortex_options = get_option('vortex_options');			
			$items = $this->vortex_boolean_pd();			
			echo '<label><input type="checkbox" id="vortex_reset_control" name="vortex_options[vortex_reset_control]" value="1" /> '. __( 'Reset Theme Options.', 'vortex' ) .'</label>';
		
		}
}

/** Initiate Admin */
new VortexAdmin();
?>