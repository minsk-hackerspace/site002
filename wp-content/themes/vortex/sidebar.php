<div class="grid_5">
  <div id="sidebar">
  
	<?php 
    if ( ! dynamic_sidebar( 'vortex-primary-sidebar' ) ):
    $vortex_theme_data = vortex_theme_data();
    ?>
    
    <div class="widget widget_search widget-widget_search">
      <div class="widget-wrap widget-inside">
        <?php get_search_form(); ?>
      </div>
    </div>
    
    <div class="widget widget_pages widget-widget_pages">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Pages', 'vortex' ); ?></h3>
          <ul><?php wp_list_pages( 'title_li=' ); ?></ul>
      </div>
    </div>
    
    <div class="widget widget_categories widget-widget_categories">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Categories', 'vortex' ); ?></h3>
          <ul><?php wp_list_categories('title_li='); ?></ul>
      </div>
    </div>
    
    <div class="widget widget_archive widget-widget_archive">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Archives', 'vortex' ); ?></h3>
          <ul><?php wp_get_archives( 'type=monthly' ); ?></ul>
      </div>
    </div>
    
    <div class="widget widget_calendar widget-widget_calendar">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Calendar', 'vortex' ); ?></h3>
        <?php get_calendar(); ?>
      </div>
    </div>
    
    <div class="widget widget_recent_entries widget-widget_recent_entries">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Recent Posts', 'vortex' ); ?></h3>
          <ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
      </div>
    </div>
    
    <div class="widget widget_tag_cloud widget-widget_tag_cloud">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Tag Cloud', 'vortex' ); ?></h3>
        <?php wp_tag_cloud('smallest=10&largest=20&number=30&unit=px&format=flat&orderby=name'); ?>
      </div>
    </div>
    
    <div class="widget widget_text widget-widget_text">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'About Vortex', 'vortex' ); ?></h3>
        <div class="textwidget"><?php printf( __( '%s', 'vortex' ), $vortex_theme_data['Description'] ); ?></div>
      </div>
    </div>
    
    <div class="widget widget_meta widget-widget_meta">
      <div class="widget-wrap widget-inside">
        <h3 class="widget-title"><?php _e( 'Meta', 'vortex' ); ?></h3>
          <ul>
            <?php wp_register(); ?>
            <li><?php wp_loginout(); ?></li>
            <li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="Syndicate this site using RSS 2.0">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="The latest comments to all posts in RSS">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
            <?php wp_meta(); ?>
          </ul>
      </div>
    </div>
    
    <?php endif; ?>
  
  </div> <!-- end #sidebar -->
</div>  <!-- end .grid_5 -->
