<div class="wrap vortex-settings">
  
  <?php 
  /** Get the parent theme data. */
  $vortex_theme_data = vortex_theme_data();
  screen_icon();
  ?>
  
  <h2><?php echo sprintf( __( '%1$s Theme Settings', 'vortex' ), $vortex_theme_data['Name'] ); ?></h2>    
  
  <?php settings_errors( 'vortex_options' ); ?>
  
  <form action="options.php" method="post" id="vortex-form-wrapper">
    
    <div id="vortex-form-header" class="vortex-clearfix">
      <input type="submit" name="" id="" class="button button-primary" value="<?php _e( 'Save Changes', 'vortex' ); ?>">
    </div>
	
	<?php settings_fields('vortex_options_group'); ?>
    
    <div id="vortex-sidebar">
      
      <ul id="vortex-group-menu">
        <li id="0_section_group_li" class="vortex-group-tab-link-li active"><a href="javascript:void(0);" id="0_section_group_li_a" class="vortex-group-tab-link-a" data-rel="0"><span><?php _e( 'Blog Settings', 'vortex' ); ?></span></a></li>
        <li id="1_section_group_li" class="vortex-group-tab-link-li"><a href="javascript:void(0);" id="1_section_group_li_a" class="vortex-group-tab-link-a" data-rel="1"><span><?php _e( 'Post Settings', 'vortex' ); ?></span></a></li>
        <li id="2_section_group_li" class="vortex-group-tab-link-li"><a href="javascript:void(0);" id="2_section_group_li_a" class="vortex-group-tab-link-a" data-rel="2"><span><?php _e( 'Footer Settings', 'vortex' ); ?></span></a></li>
        <li id="3_section_group_li" class="vortex-group-tab-link-li"><a href="javascript:void(0);" id="3_section_group_li_a" class="vortex-group-tab-link-a" data-rel="3"><span><?php _e( 'General Settings', 'vortex' ); ?></span></a></li>
      </ul>
    
    </div>
    
    <div id="vortex-main">
    
      <div id="0_section_group" class="vortex-group-tab">
        <?php do_settings_sections( 'vortex_section_blog_page' ); ?>
      </div>
      
      <div id="1_section_group" class="vortex-group-tab">
        <?php do_settings_sections( 'vortex_section_post_page' ); ?>
      </div>
      
      <div id="2_section_group" class="vortex-group-tab">
        <?php do_settings_sections( 'vortex_section_footer_page' ); ?>
      </div>
      
      <div id="3_section_group" class="vortex-group-tab">
        <?php do_settings_sections( 'vortex_section_general_page' ); ?>
      </div>
    
    </div>
    
    <div class="clear"></div>
    
    <div id="vortex-form-footer" class="vortex-clearfix">
      <input type="submit" name="" id="" class="button button-primary" value="<?php _e( 'Save Changes', 'vortex' ); ?>">
    </div>
    
  </form>

</div>