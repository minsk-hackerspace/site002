<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
  <h1 class="entry-title entry-title-single"><?php the_title(); ?></h1>
  
  <div class="entry-meta">    
	<?php echo vortex_post_date() . vortex_post_comments() . vortex_post_author() . vortex_post_sticky() . vortex_post_edit_link(); ?>
  </div><!-- .entry-meta -->
  
  <div class="entry-content clearfix">
  	<?php the_content(); ?>
  </div> <!-- end .entry-content -->
  
  <?php echo vortex_link_pages(); ?>
  
  <div class="entry-meta-bottom">
  <?php echo vortex_post_category() . vortex_post_tags(); ?>
  </div><!-- .entry-meta -->

</div> <!-- end #post-<?php the_ID(); ?> .post_class -->

<?php vortex_author(); ?> 

<?php comments_template( '', true ); ?>