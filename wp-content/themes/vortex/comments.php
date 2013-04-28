<div id="comments" class="grid_inside">
  
  <?php if ( post_password_required() ) : ?>
  <p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'vortex' ); ?></p>
  </div><!-- #comments -->
  <?php
  /**
    * Stop the rest of comments.php from being processed,
    * but don't kill the script entirely -- we still have
    * to fully load the template.
    */
	return;
	endif;
  ?>

  <?php if ( have_comments() ) : ?>
  
  <h3 id="comments-title">
    <?php printf( _n( 'One Thought on &ldquo;%2$s&rdquo;', '%1$s Thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'vortex' ), get_comments_number(), '<span>' . get_the_title() . '</span>' ); ?>
  </h3>

  <ol class="commentlist">
    <?php wp_list_comments( apply_filters ( 'vortex_list_comments', array( 'callback' => 'vortex_comment' ) ) ); ?>
  </ol>

  <?php if ( get_comment_pages_count() > 1 ) : ?>
  
  <div id="comments-nav-below" class="clearfix">
	
    <?php
    ob_start();
	previous_comments_link( __( '&larr; Older Comments', 'vortex' ) );
	$previous_comments_link = ob_get_clean();
	
	ob_start();
	next_comments_link( __( 'Newer Comments &rarr;', 'vortex' ) );
	$next_comments_link = ob_get_clean();
	
	$previous_comments_link = ( empty( $previous_comments_link ) )? '&nbsp;' : $previous_comments_link;	
	$next_comments_link = ( empty( $next_comments_link ) )? '&nbsp;' : $next_comments_link;	
	?>
    
    <h3 class="assistive-text"><?php _e( 'Comment navigation', 'vortex' ); ?></h3>
    <div class="loop-nav-previous grid_5 alpha"><?php echo $previous_comments_link; ?></div>
    <div class="loop-nav-next grid_6 omega"><?php echo $next_comments_link; ?></div>
  </div>
  <?php endif; ?>

  <?php
  /**
    * If there are no comments and comments are closed, let's leave a little note, shall we?
	* But we don't want the note on pages or post types that do not support comments.
	*/
  elseif ( !comments_open() && !is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
  ?>
  <p class="nocomments"><?php _e( 'Comments are closed.', 'vortex' ); ?></p>
  <?php endif; ?>

  <?php comment_form(); ?>

</div><!-- #comments -->