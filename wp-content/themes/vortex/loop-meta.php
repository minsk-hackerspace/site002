<?php if ( is_category() ) : ?>      

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php printf( __( 'Category Archives: %s', 'vortex' ), '<span>' . ucwords( strtolower ( single_cat_title( '', false ) ) ) . '</span>' ); ?></h1>
      <div class="loop-meta-description"><?php echo category_description(); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php elseif ( is_tag() ) : ?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php printf( __( 'Tag Archives: %s', 'vortex' ), '<span>' . ucwords( strtolower ( single_tag_title( '', false ) ) ) . '</span>' ); ?></h1>
      <div class="loop-meta-description"><?php echo tag_description(); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php 
elseif ( is_author() ) :
$user_id = get_query_var( 'author' );
?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php printf( __( 'Author Archives: %s', 'vortex' ), '<span>' . ucwords( strtolower ( get_the_author_meta( 'display_name', $user_id ) ) ) . '</span>' ); ?></h1>
      <div class="loop-meta-description"><?php echo wpautop( get_the_author_meta( 'description', $user_id ) ); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php elseif ( is_search() ) : ?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php printf( __( 'Search Results: %s', 'vortex' ), '<span>' . ucwords( strtolower ( esc_attr ( get_search_query() ) ) ) . '</span>' ); ?></h1>
      <div class="loop-meta-description"><?php printf( __( 'You are browsing the search results for %s', 'vortex' ), esc_attr( get_search_query() ) ); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php elseif ( is_day() ) : ?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php printf( __( 'Daily Archives: %s', 'vortex' ), '<span>' . get_the_date() . '</span>' ); ?></h1>
      <div class="loop-meta-description"><?php _e( 'You are browsing the site archives by date.', 'vortex' ); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php elseif ( is_month() ) : ?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php printf( __( 'Monthly Archives: %s', 'vortex' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); ?></h1>
      <div class="loop-meta-description"><?php _e( 'You are browsing the site archives by month.', 'vortex' ); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php elseif ( is_year() ) : ?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php printf( __( 'Yearly Archives: %s', 'vortex' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); ?></h1>
      <div class="loop-meta-description"><?php _e( 'You are browsing the site archives by year.', 'vortex' ); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php elseif ( is_archive() ) : ?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php _e( 'Archives', 'vortex' ); ?></h1>
      <div class="loop-meta-description"><?php _e( 'You are browsing the site archives.', 'vortex' ); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php elseif ( is_404() ) : ?>

<div id="loop_meta_wrapper">
  <div class="container_16 clearfix">
    <div id="loop-meta" class="grid_16">
      <h1 class="loop-meta-title"><?php _e( '404', 'vortex' ); ?></h1>
      <div class="loop-meta-description"><?php _e( 'Whoah! You broke something!', 'vortex' ); ?></div>
    </div> <!-- end #loop-meta -->
  </div> <!-- end .container_16 -->
</div>

<?php endif; ?>