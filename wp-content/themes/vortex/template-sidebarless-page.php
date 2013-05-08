<?php
/*
 * Template Name: Page without sidebar
 */

get_header(); ?>

<div class="container_16 clearfix">
  
    <div id="content">	  
	  
	  <?php if ( have_posts() ) : ?>
      
        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php get_template_part( 'content', 'page' ); ?>
        
        <?php endwhile; ?>
      
      <?php else : ?>
                  
        <?php get_template_part( 'loop-error' ); ?>
      
      <?php endif; ?>
      
    </div> <!-- end #content -->
  

</div> <!-- end .container_16 -->
  
<?php get_footer(); ?>
