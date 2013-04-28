<div class="search">
  <form method="get" class="searchform" action="<?php echo trailingslashit( home_url() ); ?>">
    <label for="s" class="assistive-text"><?php _e( 'Search for:', 'vortex' ); ?></label>
    <input type="text" class="field" name="s" id="s" value="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else esc_attr_e( 'Search', 'vortex' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
    <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'vortex' ); ?>" />
  </form>
</div><!-- end .search -->